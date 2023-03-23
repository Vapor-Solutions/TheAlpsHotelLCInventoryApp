<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\Invoice;
use App\Models\Sale;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Create extends Component
{
    public Invoice $invoice;

    protected $rules = [
        'invoice.sale_id' => 'required',
    ];

    public function mount()
    {
        $this->invoice = new Invoice();
    }

    public function save()
    {
        $this->validate();
        $this->invoice->amount = Sale::find($this->invoice->sale_id)->balance;
        $invoice = Invoice::where('sale_id', $this->invoice->sale_id)->where('amount', $this->invoice->amount);
        if ($invoice->exists()) {
            throw ValidationException::withMessages([
                'invoice.sale_id'=>'An invoice Similar to this already Exists! Check Invoice No.'.$invoice->first()->id
            ]);
        }
        $this->invoice->user_id = auth()->user()->id;
        $this->invoice->save();
        return redirect()->route('admin.invoices.index');
    }

    public function render()
    {
        return view('livewire.admin.invoices.create');
    }
}
