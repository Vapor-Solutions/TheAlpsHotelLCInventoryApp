<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class Index extends Component
{
    public $brands;

    protected $listeners = [
        'done' => 'render'
    ];

    public function mount()
    {
        $this->brands = Brand::all();
    }

    public function delete($id)
    {
        $brand = Brand::find($id);

        if (count($brand->productDescriptions) == 0) {
            if ($brand->logo_path) {
                unlink($brand->logo_path);
            }

            $brand->delete();

            $this->emit('done', [
                'success' => 'Successfully Deleted this Brand'
            ]);
        } else {
            $this->emit('done', [
                'warning' => 'This Brand has Products Attached to it'
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.brands.index');
    }
}
