<?php

namespace App\Http\Livewire\Admin\UnitTypes;

use App\Models\UnitType;
use Livewire\Component;

class Edit extends Component
{
    public UnitType $type;

    protected $rules = [
        'type.title'=>'required',
        'type.default'=>'required',
    ];


    public function mount($id)
    {
        $this->type = UnitType::find($id);

    }

    public function save()
    {
        $this->validate();
        $this->type->save();
        return redirect()->route('admin.unit-types.index');
    }
    public function render()
    {
        return view('livewire.admin.unit-types.edit');
    }
}
