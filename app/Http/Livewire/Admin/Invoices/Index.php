<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Models\Invoice;
use Livewire\Component;

class Index extends Component
{
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();

        $this->emit('done', [
            'success' => 'Successfully Deleted the Invoice'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.invoices.index', [
            'invoices' => Invoice::all()
        ]);
    }
}
