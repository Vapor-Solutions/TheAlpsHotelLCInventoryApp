<?php

namespace App\Http\Livewire\Admin\PurchaseOrders;

use App\Models\ActivityLog;
use App\Models\PurchaseOrder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->middleware('permission:Delete Purchase Orders')->only('delete');
    }
    public function delete($id)
    {
        $order= PurchaseOrder::find($id);
        $order->productDescriptions()->detach();
        $order->delete();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Deleted Purchase Order No. " . $order->id
        ]);


        $this->emit('done', [
            'success'=>"Successfully Deleted that Purchase Order"
        ]);


    }

    public function render()
    {
        return view('livewire.admin.purchase-orders.index',[
            'orders' => PurchaseOrder::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
