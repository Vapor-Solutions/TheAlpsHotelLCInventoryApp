<?php

namespace App\Http\Livewire\Admin\PurchaseOrders;

use App\Models\PurchaseOrder;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $order= PurchaseOrder::find($id);
        $order->productDescriptions()->detach();
        $order->delete();

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
