<?php

namespace App\Http\Livewire\Admin\Units;

use App\Models\Unit;
use Livewire\Component;

class Edit extends Component
{
    public Unit $unit;

    protected $rules=[
        'unit.unit_type_id'=>'required',
        'unit.title'=>'required',
        'unit.symbol'=>'required',
        'unit.rate'=>'required',

    ];

    public function mount($id)
    {
        $this->unit = Unit::find($id);
    }

    public function save()
    {
        $this->validate();
        $this->unit->save();

        return redirect()->route('admin.units.index');
    }
    public function render()
    {
        return view('livewire.admin.units.edit');
    }
}
