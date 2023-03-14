<?php

namespace App\Http\Livewire\Admin\Sales;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.admin.sales.index', [
            'sales' => Sale::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
