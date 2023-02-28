<?php

namespace App\Http\Livewire\Admin\Units;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.units.index',[
            'units'=>Unit::all()
        ]);
    }
}
