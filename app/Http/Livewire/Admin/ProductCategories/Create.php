<?php

namespace App\Http\Livewire\Admin\ProductCategories;

use App\Models\ActivityLog;
use App\Models\ProductCategory;
use Livewire\Component;

class Create extends Component
{
    public ProductCategory $product_category;

    protected $rules = [
        'product_category.title' => 'required'
    ];


    public function mount()
    {
        $this->middleware('permission:Create Product Categories');
        $this->product_category = new ProductCategory();
    }

    public function save()
    {
        $this->validate();
        $this->product_category->save();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Created Product Category No. " . $this->product_category->id
        ]);
        return redirect()->route('admin.product-categories.index');
    }

    public function render()
    {
        return view('livewire.admin.product-categories.create');
    }
}
