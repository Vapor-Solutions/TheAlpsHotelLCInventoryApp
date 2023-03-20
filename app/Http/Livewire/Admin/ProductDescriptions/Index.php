<?php

namespace App\Http\Livewire\Admin\ProductDescriptions;

use App\Models\ProductDescription;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    // public $product_descriptions;

    public $products,$inventory_value, $actual_inventory;
    protected $paginationTheme  ='bootstrap';

    public function mount()
    {
        // $this->product_descriptions = ProductDescription::all();
        $this->products = ProductDescription::all();
        // $this->customers = Customer::all();
        foreach ($this->products as $product) {
            $this->inventory_value += ($product->price*count($product->productItems));
            $this->actual_inventory += ($product->actual_value);
        }
    }


    public function delete($id)
    {
        // ProductDescription::find($id)->delete();
        $desc =  ProductDescription::find($id);

        if ($desc->productItems->count() > 0) {
            $this->emit('done', [
                'warning' => "You cannot Delete a Product Description that has Existing Items attached "
            ]);
            return;
        }

        $desc->delete();

        $this->emit('done', [
            'success'=>'Successfully Deleted the Product Description'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product-descriptions.index', [
            'product_descriptions'=>ProductDescription::paginate(5)
        ]);
    }
}
