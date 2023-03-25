<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use App\Models\ProductDescription;
use App\Models\ProductItem;
use App\Models\Purchase;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $products = [];
    public $departments = [];
    public $inventory_value = 0;
    public $purchasesThisMonth = [];
    public $purchasevalue = 0;


    public $readyToLoad = false;

    public function loadStuff()
    {
        $this->products = ProductItem::select(['id', 'product_description_id', 'price'])->get();
        $this->departments = Department::all();
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $this->purchasesThisMonth = Purchase::whereBetween('purchase_date', [$start, $end])->get();

        foreach ($this->purchasesThisMonth as $purchase) {
            $this->purchasevalue += $purchase->total_cost;
        }


        foreach ($this->products as $product) {
            $this->inventory_value += $product->price;
        }

        $this->readyToLoad = true;
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
        // dd(ProductItem::with('productDescription')->limit(5)->get());
    }
}
