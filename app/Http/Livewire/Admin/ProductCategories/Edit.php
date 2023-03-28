<?php

namespace App\Http\Livewire\Admin\ProductCategories;

use App\Models\ActivityLog;
use App\Models\ProductCategory;
use Livewire\Component;

class Edit extends Component
{

    public ProductCategory $product_category;

    protected $rules = [
        'product_category.title' => 'required'
    ];


    public function mount($id)
    {
        // $this->middleware('permission:Update Product Categries');
        $this->product_category = ProductCategory::find($id);
    }

    public function save()
    {
        $this->validate();
        $this->product_category->save();


        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Edited Product Category No. " . $this->product_category->id
        ]);

        return redirect()->route('admin.product-categories.index');
    }

    public function render()
    {
        return view('livewire.admin.product-categories.edit');
    }
}
