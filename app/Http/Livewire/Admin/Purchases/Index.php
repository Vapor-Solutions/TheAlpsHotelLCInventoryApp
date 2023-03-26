<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function delete($id)
    {
        $purchase = Purchase::find($id);
        $purchase->productItems()->delete();
        $purchase->productItems()->detach();
        $purchase->delete();

        $this->emit('done', [
            'success' => "Successfully Deleted that Purchase from the system"
        ]);
    }
    public function render()
    {
        return view('livewire.admin.purchases.index', [
            'purchases' => Purchase::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
