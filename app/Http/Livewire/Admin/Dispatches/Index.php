<?php

namespace App\Http\Livewire\Admin\Dispatches;

use App\Models\Dispatch;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.dispatches.index',[
            'dispatches' => Dispatch::orderBy('id', 'DESC')->paginate(10)
        ]);
    }
}
