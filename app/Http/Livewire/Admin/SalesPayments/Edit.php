<?php

namespace App\Http\Livewire\Admin\SalesPayments;

use App\Models\SalesPayment;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Edit extends Component
{
    public SalesPayment $payment;
    public $old_amount;

    protected $rules = [
        'payment.sale_id' => 'required',
        'payment.payment_method_id' => 'required',
        'payment.amount' => 'required',
    ];

    public function mount($id)
    {
        $this->payment = SalesPayment::find($id);
        $this->old_amount = $this->payment->amount;
    }


    public function save()
    {
        $this->validate();


        if ($this->payment->amount > ($this->payment->sale->balance + $this->old_amount)) {
            throw ValidationException::withMessages([
                'payment.amount' => "The Value of this Payment can not be more than the balance of the Sale that's being paid for"
            ]);
        }

        $this->payment->save();


        return redirect()->route('admin.sales-payments.index');
    }
    public function render()
    {
        return view('livewire.admin.sales-payments.edit');
    }
}
