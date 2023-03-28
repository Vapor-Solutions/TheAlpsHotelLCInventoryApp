<?php

namespace App\Http\Livewire\Admin\Units;

use App\Models\ActivityLog;
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
        $this->middleware('permission:Update Units');
        $this->unit = Unit::find($id);
    }

    public function save()
    {
        $this->validate();
        $this->unit->save();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Updated Measurement Unit No. " . $this->unit->id
        ]);

        return redirect()->route('admin.units.index');
    }
    public function render()
    {
        return view('livewire.admin.units.edit');
    }
}
