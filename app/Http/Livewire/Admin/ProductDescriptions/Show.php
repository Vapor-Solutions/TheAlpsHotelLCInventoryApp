<?php

namespace App\Http\Livewire\Admin\ProductDescriptions;

use App\Models\ProductDescription;
use App\Models\ProductItem;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Show extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public ProductDescription $product;
    public ProductItem $productItem;
    public $quantity, $price;

    protected $listeners = [
        'done' => 'render',
        // 'done' => 'mount',
    ];

    protected $rules = [
        'productItem.sku_number' => 'required|unique:product_items,sku_number',
        'productItem.price' => 'required'
    ];

    public function mount($id)
    {
        $this->product = ProductDescription::find($id);
        $this->productItem = new ProductItem();
    }

    public function addProduct()
    {

        $this->validate();
        $this->productItem->product_description_id = $this->product->id;

        $this->productItem->save();
        $this->productItem = new ProductItem();
        $this->emit('done', [
            'success' => 'Successfully Added a new ' . $this->product->title . '-' . $this->product->quantity . $this->product->unit->title
        ]);
    }

    public function generateSku()
    {
        $this->productItem->sku_number = Str::random(9);
    }

    public function addProducts()
    {
        $this->validate([
            'quantity' => 'required|integer|min:2',
            'price' => 'required|numeric'
        ]);

        for ($i = 0; $i < $this->quantity; $i++) {
            $this->productItem->product_description_id = $this->product->id;
            $this->productItem->sku_number = Str::random(9);
            $this->productItem->price = $this->price;
            $this->productItem->save();
            $this->productItem = new ProductItem();
        }

        $this->emit('done', [
            'success' => 'Successfully Added '.$this->quantity.' new ' . $this->product->title . '-' . $this->product->quantity . $this->product->unit->title.'s'
        ]);
    }


    public function render()
    {
        return view('livewire.admin.product-descriptions.show', [
            'productItems' => ProductItem::where('product_description_id', $this->product->id)->orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
}
