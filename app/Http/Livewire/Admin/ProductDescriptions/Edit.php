<?php

namespace App\Http\Livewire\Admin\ProductDescriptions;

use App\Models\ActivityLog;
use App\Models\ProductDescription;
use App\Models\ProductImage;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
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

    protected $listeners = [
        'done' => 'render'
    ];

    public function mount($id)
    {
        // $this->middleware('permission:Edit Product Descriptions');
        $this->product_description = ProductDescription::find($id);
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
            }
        }

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Edited Product Description No. " . $this->product_description->id
        ]);

        return redirect()->route('admin.product-descriptions.index');
    }


    public function deleteImage($id)
    {
        $img = ProductImage::find($id);
        unlink($img->image_path);
        $img->delete();

        $this->emit('done', [
            'success' => "Successfully Removed An Image"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.product-descriptions.edit');
    }
}
