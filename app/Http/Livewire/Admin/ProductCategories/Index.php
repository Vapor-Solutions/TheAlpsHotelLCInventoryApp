<?php

namespace App\Http\Livewire\Admin\ProductCategories;

use App\Models\ProductCategory;
use Livewire\Component;

class Index extends Component
{
    public $productCategories;


    public function mount()
    {
        $this->productCategories = ProductCategory::all();
    }

    public function delete($id)
    {
        ProductCategory::find($id)->delete();
        $this->emit('done', [
            'success'=>"Successfully Deleted a Product Category"
        ]);
    }


    public function render()
    {
        return view('livewire.admin.product-categories.index');
    }
}
