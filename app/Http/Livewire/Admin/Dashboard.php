<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use App\Models\ProductItem;
use Livewire\Component;

class Dashboard extends Component
{
    public $products;
    public $customers;
    public $inventory_value = 0;

    public function mount()
    {
        $this->products = ProductItem::all();
        $this->customers = Customer::all();
        foreach ($this->products as $product) {
            $this->inventory_value += $product->price;
        }
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
