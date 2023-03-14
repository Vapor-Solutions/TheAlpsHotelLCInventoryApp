<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Purchase;
use Livewire\Component;

class Show extends Component
{

    public Purchase $purchase;
    // public $productItems;

    public function mount($id)
    {
        $this->purchase = Purchase::find($id);

    }
    public function render()
    {
        return view('livewire.admin.purchases.show');
    }
}
