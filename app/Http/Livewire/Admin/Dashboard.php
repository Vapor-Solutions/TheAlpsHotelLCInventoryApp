<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use App\Models\ProductDescription;
use App\Models\ProductItem;
use Livewire\Component;

class Dashboard extends Component
{
    public $products;
    public $customers;
    public $inventory_value = 0;
    public $revenue;

    public function mount()
    {
        $this->products = ProductDescription::all();
        $this->customers = Customer::all();

        $estimate = 0;
        foreach ($this->products as $product) {
            $this->inventory_value += ($product->actual_value);
            $estimate += ($product->price * $product->available_items);

            $this->revenue = $estimate != 0 ? (($estimate - $this->inventory_value) / $estimate) * 100 : 0;
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
