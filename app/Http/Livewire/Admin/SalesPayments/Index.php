<?php

namespace App\Http\Livewire\Admin\SalesPayments;

use App\Models\SalesPayment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view(
            'livewire.admin.sales-payments.index',
            [
                'sales_payments' => SalesPayment::orderBy('created_at', 'DESC')->paginate(5)
            ]
        );
    }
}
