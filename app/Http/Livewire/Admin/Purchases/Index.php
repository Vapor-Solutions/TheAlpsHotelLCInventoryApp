<?php

namespace App\Http\Livewire\Admin\Purchases;

use App\Models\Purchase;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.purchases.index', [
            'purchases' => Purchase::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
