<?php

namespace App\Http\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Department;
use App\Models\Dispatch;
use App\Models\ProductDescription;
use App\Models\ProductItem;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $from_date;
    public $to_date;

    public $products = [];
    public $departments = [];
    public $inventory_value = 0;
    public $purchasesThisMonth = [];
    public $dispatchesThisMonth = [];
    public $purchasevalue = 0;
    public $dispatchValue = 0;


    public $readyToLoad = false;

    public function loadStuff()
    {
        $this->products = ProductItem::select(['id', 'product_description_id', 'price'])->get();
        $this->departments = Department::all();
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $this->purchasesThisMonth = Purchase::whereBetween('purchase_date', [$start, $end])->get();
        $this->dispatchesThisMonth = Dispatch::whereBetween('dispatch_date', [$start, $end])->get();

        foreach ($this->purchasesThisMonth as $purchase) {
            $this->purchasevalue += $purchase->total_cost;
        }
        foreach ($this->dispatchesThisMonth as $dispatch) {
            $this->dispatchValue += $dispatch->total_cost;
        }


        foreach ($this->products as $product) {
            $this->inventory_value += $product->price;
        }
        foreach (Dispatch::all() as $dispatch1) {
            $this->inventory_value -= $dispatch1->total_cost;
        }

        $this->readyToLoad = true;
    }
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'activities' => $this->readyToLoad ? ActivityLog::orderBy('created_at', 'DESC')->paginate(5) : []
        ]);
        // dd(ProductItem::with('productDescription')->limit(5)->get());
    }

    public function generateReport()
    {
        // Ensure the dates have been set
        if (!$this->from_date || !$this->to_date) {
            $this->emit('done', [
                'warning' => "Both Dates are required"
            ]);

            return;
        }

        // Convert to Carbon instances
        $from_date = Carbon::parse($this->from_date);
        $to_date = Carbon::parse($this->to_date);

        // Get opening stock - total purchases up to the start date
        $purchases_before = Purchase::where('purchase_date', '<', $from_date)->get();
        $dispatches_before = Dispatch::where('dispatch_date', '<', $from_date)->get();
        $opening_stock_value = 0;
        foreach ($purchases_before as $pb) {
            $opening_stock_value += $pb->total_cost;
        }
        foreach (ProductItem::all() as $product) {
            if (count($product->purchases) == 0) {
                $opening_stock_value += $product->price;
            }
        }
        foreach ($dispatches_before as $db) {
            $opening_stock_value -= $db->total_cost;
        }

        // Get closing stock - total purchases up to the end date

        // $closing_stock = Purchase::where('purchase_date', '<=', $to_date)
        //     ->sum('quantity');

        // // Get purchases between selected dates
        $purchases_between = Purchase::whereBetween('purchase_date', [$from_date, $to_date])
            ->get();
        $purchases_btwn_value = 0;

        foreach ($purchases_between as $purchase) {
            $purchases_btwn_value += $purchase->total_cost;
        }


        // Dispatches between selected dates
        $dispatches_between = Dispatch::whereBetween('dispatch_date', [$from_date, $to_date])
            ->get();
        $dispatches_btwn_value = 0;

        foreach ($dispatches_between as $dispatch) {
            $dispatches_btwn_value += $dispatch->total_cost;
        }

        // Here you can return or emit these data to the frontend part.
        // For example, if you want to return this as a response to the AJAX call,
        // you can just return these as an array:
        $data = [
            'opening_stock' => $opening_stock_value,
            'purchases_between' => $purchases_btwn_value,
            'dispatches_between' => $dispatches_btwn_value,
            'purchases'=>$purchases_between,
            'dispatches'=>$dispatches_between,
        ];

        $pdf = Pdf::loadView('documents.purchase-report', $data);

        $filename = 'inventory_report_' . time() . '.pdf';
        Storage::put('reports/' . $filename, $pdf->output());

        // You could then do something with the file, like download it or
        // redirect the user to a page where they can download the file
        return response()->download(public_path('reports/' . $filename))->deleteFileAfterSend(true);

        // $this->emit('done', [
        //     'success' => "Opening Stock: KES " . number_format($opening_stock_value, 2)
        // ]);
    }
}
