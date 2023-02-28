<?php

namespace App\Http\Livewire\Admin\Suppliers;

use App\Models\ActivityLog;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    // public $suppliers;

    protected $listeners = [
        'done' => 'render'
    ];

    public function mount()
    {
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        $log = new ActivityLog();
        $log->user_id = auth()->user()->id;
        $log->payload = "<strong>" . auth()->user()->id . "</strong> deleted supplier No. <strong>$supplier->id</strong> from the system";


        $this->emit('done', [
            'success' => "Successfully Deleted the Supplier `$supplier->name` from the system"
        ]);
    }

    public function render()
    {
        return view('livewire.admin.suppliers.index', [
            'suppliers' => Supplier::orderBy('id', 'DESC')->paginate(6)
        ]);
    }
}
