<?php

namespace App\Http\Livewire\Admin\UnitTypes;

use App\Models\UnitType;
use Livewire\Component;

class Create extends Component
{
    public UnitType $type;

    protected $rules = [
        'type.title'=>'required',
        'type.default'=>'required',
    ];


    public function mount()
    {
        $this->type = new UnitType();

    }

    public function save()
    {
        $this->validate();
        $this->type->save();
        return redirect()->route('admin.unit-types.index');
    }
    public function render()
    {
        return view('livewire.admin.unit-types.create');
    }
}
