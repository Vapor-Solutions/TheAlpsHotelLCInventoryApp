<?php

namespace App\Http\Livewire\Admin\Units;

use App\Models\Unit;
use Livewire\Component;

class Create extends Component
{

    public Unit $unit;

    protected $rules=[
        'unit.unit_type_id'=>'required',
        'unit.title'=>'required',
        'unit.symbol'=>'required',
        'unit.rate'=>'required',

    ];

    public function mount()
    {
        $this->unit = new Unit();
    }

    public function save()
    {
        $this->validate();
        $this->unit->save();

        return redirect()->route('admin.units.index');
    }

    public function render()
    {
        return view('livewire.admin.units.create');
    }
}
