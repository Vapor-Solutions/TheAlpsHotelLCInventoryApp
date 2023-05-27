<?php

namespace App\Http\Livewire\Admin\ProductDescriptions;

use App\Models\ActivityLog;
use App\Models\ProductDescription;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    // public $product_descriptions;

    public $products = [];
    public $inventory_value, $actual_inventory;
    protected $paginationTheme  = 'bootstrap';
    public $searchTerm;

    public function mount()
    {
        // $this->product_descriptions = ProductDescription::all();
        // $this->middleware('permission:Delete Product Descriptions')->only('delete');
        // $this->products = ProductDescription::all();
        // $this->customers = Customer::all();
        foreach ($this->products as $product) {
            $this->inventory_value += ($product->price * count($product->productItems));
            $this->actual_inventory += ($product->actual_value);
        }
    }

    public function search()
    {

        $this->products = ProductDescription::where('title', 'like', '%' . $this->searchTerm . '%')
            ->orWhereHas('brand', function ($query) {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            })
            ->orWhereHas('category', function ($query) {
                $query->where('title', 'like', '%' . $this->searchTerm . '%');
            })
            ->orderBy('id', 'DESC')
            ->get();
    }


    public function delete($id)
    {
        if (!auth()->user()->hasPermissionTo('Delete Product Descriptions')) {
            $this->emit('done', [
                'warning' => 'You are not permitted to delete the Product Descriptions'
            ]);
            return;
        }

        if ($desc->productItems->count() > 0) {
            $this->emit('done', [
                'warning' => "You cannot Delete a Product Description that has Existing Items attached "
            ]);
            return;
        }

        $desc =  ProductDescription::find($id);
        $desc->delete();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Deleted Product Description No. " . $desc->id
        ]);


        $this->emit('done', [
            'success' => 'Successfully Deleted the Product Description'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.product-descriptions.index');
    }
}
