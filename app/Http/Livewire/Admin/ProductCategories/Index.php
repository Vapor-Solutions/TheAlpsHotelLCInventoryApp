<?php

namespace App\Http\Livewire\Admin\ProductCategories;

use App\Models\ActivityLog;
use App\Models\ProductCategory;
use Livewire\Component;

class Index extends Component
{
    public $productCategories;

    protected $listeners = [
        'done' => 'render'
    ];

    public function mount()
    {
        // $this->middleware('permission:Delete Product Categories')->only('delete');
        $this->productCategories = ProductCategory::all();
    }

    public function delete($id)
    {
        $cat = ProductCategory::find($id);

        if ($cat->productDescriptions->count() > 0) {
            $this->emit('done', [
                'warning' => "You cannot Delete a Category that has Product Descriptions attached "
            ]);
            return;
        }

        $cat->delete();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Deleted Product Category No. $cat->id"
        ]);
        $this->emit('done', [
            'success' => "Successfully Deleted a Product Category"
        ]);
    }


    public function render()
    {
        return view('livewire.admin.product-categories.index');
    }
}
