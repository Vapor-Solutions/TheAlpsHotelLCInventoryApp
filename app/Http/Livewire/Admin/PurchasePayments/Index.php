<?php

namespace App\Http\Livewire\Admin\PurchasePayments;

use Livewire\Component;
use App\Models\PurchasePayment;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function mount()
    {
        $this->middleware('permission:Read Purchase Payments');
    }
    public function render()
    {
        return view('livewire.admin.purchase-payments.index', [
            'purchase_payments' => PurchasePayment::orderBy('created_at', 'DESC')->paginate(5)
        ]);
    }
}
