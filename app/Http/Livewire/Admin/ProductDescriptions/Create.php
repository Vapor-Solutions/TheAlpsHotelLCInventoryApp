<?php

namespace App\Http\Livewire\Admin\ProductDescriptions;

use App\Models\ProductDescription;
use App\Models\ProductImage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public ProductDescription $product_description;
    public $images;

    protected $rules = [
        'images.*' => 'nullable|image|max:1536',
        'product_description.title' => 'required',
        'product_description.description' => 'required',
        'product_description.brand_id' => 'required',
        'product_description.product_category_id' => 'required',
        'product_description.unit_id' => 'required',
        'product_description.quantity' => 'required|min:0',
        'product_description.price' => 'required|min:0',
    ];

    public function mount()
    {
        $this->product_description = new ProductDescription();
    }

    public function save()
    {
        $this->validate();

        $this->product_description->save();

        if (isset($this->images)) {
            foreach ($this->images as $image) {
                $prodimg = new ProductImage();
                $prodimg->product_description_id = $this->product_description->id;
                $image->storeAs('product_images', Str::slug($this->product_description->title) . '-' . count($this->product_description->productImages) . '.' . $image->extension());
                $prodimg->image_path = 'product_images/' . Str::slug($this->product_description->title) . '-' . count($this->product_description->productImages) . '.' . $image->extension();
                $prodimg->save();
            }
        }


        return redirect()->route('admin.product-descriptions.index');
    }

    public function render()
    {
        return view('livewire.admin.product-descriptions.create');
    }
}
