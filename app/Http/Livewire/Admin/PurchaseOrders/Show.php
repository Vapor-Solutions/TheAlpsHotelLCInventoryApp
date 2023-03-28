<?php

namespace App\Http\Livewire\Admin\PurchaseOrders;

use App\Models\PurchaseOrder;
use Livewire\Component;

class Show extends Component
{
    public PurchaseOrder $order;

    public function mount($id)
    {
        $this->middleware('permission:Read Purchase Orders');
        $this->order = PurchaseOrder::find($id);
    }
    public function render()
    {
        return view('livewire.admin.purchase-orders.show');
    }
}
