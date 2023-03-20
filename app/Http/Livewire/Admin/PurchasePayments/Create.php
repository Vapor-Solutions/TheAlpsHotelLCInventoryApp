<?php

namespace App\Http\Livewire\Admin\PurchasePayments;

use App\Models\PurchasePayment;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Create extends Component
{
    public PurchasePayment $payment;

    protected $rules = [
        'payment.purchase_id' => 'required',
        'payment.payment_method_id' => 'required',
        'payment.amount' => 'required',
    ];

    public function mount()
    {
        $this->payment = new PurchasePayment();
    }


    public function save()
    {
        $this->validate();

        if ($this->payment->amount > $this->payment->purchase->balance) {
            throw ValidationException::withMessages([
                'payment.amount' => "The Value of this Payment can not be more than the balance of the Purchase that's being paid for"
            ]);
        }

        $this->payment->save();


        return redirect()->route('admin.purchase-payments.index');
    } public function render()
    {
        return view('livewire.admin.purchase-payments.create');
    }
}
