<?php

namespace App\Http\Livewire\Admin\PaymentMethods;

use App\Models\ActivityLog;
use App\Models\PaymentMethod;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'done'=>'render'
    ];

    public function mount()
    {
        $this->middleware('permission:Delete Payment Methods')->only('delete');
    }

    public function delete($id)
    {
        $method = PaymentMethod::find($id);
        if ($method->hasPurchasePayments() || $method->hasSalesPayments()) {
            $this->emit('done', [
                'warning'=>"You can't delete a payment method that has already been used for purchases and or sales"
            ]);
            return;
        }

        if ($method->logo_path) unlink($method->logo_path);
        $method->delete();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Deleted Payment Method No. $method->id"
        ]);
        $this->emit('done', [
            'success'=>"Successfully Deleted that Payment Method"
        ]);



    }
    public function render()
    {
        return view('livewire.admin.payment-methods.index', [
            'paymentMethods'=>PaymentMethod::all()
        ]);
    }
}
