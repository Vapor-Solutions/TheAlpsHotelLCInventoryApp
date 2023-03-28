<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\Invoice;
use Livewire\Component;

class Edit extends Component
{
    public Invoice $invoice;

    protected $rules = [
        'invoice.sale_id'=>'required',
        'invoice.amount'=>'required',
    ];

    public function mount($id)
    {
        // $this->middleware('permission:Update Invoices');
        $this->invoice = Invoice::find($id);
    }

    public function save()
    {
        $this->validate();
        $this->invoice->user_id = auth()->user()->id;
        $this->invoice->save();

        return redirect()->route('admin.invoices.index');
    }
    public function render()
    {
        return view('livewire.admin.invoices.edit');
    }
}
