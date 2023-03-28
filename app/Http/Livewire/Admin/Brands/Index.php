<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\ActivityLog;
use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'done' => 'render'
    ];


    public function mount()
    {
        // $this->middleware('permission:Delete Brands')->only('delete');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);

        if (count($brand->productDescriptions) == 0) {
            if ($brand->logo_path) {
                unlink($brand->logo_path);
            }

            $brand->delete();

            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'payload' => "Deleted Brand No. " . $brand->id . " from the system"
            ]);

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
        return view('livewire.admin.brands.index', [
            'brands' => Brand::orderBy('id', 'DESC')->paginate(8)
        ]);
    }
}
