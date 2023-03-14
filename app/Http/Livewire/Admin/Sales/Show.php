<?php

namespace App\Http\Livewire\Admin\Sales;

use App\Models\Sale;
use Livewire\Component;

class Show extends Component
{
    public Sale $sale;
    // public $productItems;

    public function mount($id)
    {
        $this->sale = Sale::find($id);

    }
    public function render()
    {
        return view('livewire.admin.sales.show');
    }
}
