<?php

namespace App\Http\Livewire\Admin\UnitTypes;

use App\Models\UnitType;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = [
        'done' => 'render'
    ];

    public function delete($id)
    {
        $type = UnitType::find($id);

        if ($type->units->count() > 0) {
            $this->emit('done', [
                'warning' => 'This Unit Type has Measurement Units Linked to it'
            ]);
            return;
        }

        $type->delete();

        $this->emit('done', [
            'success' => 'Successfully Deleted a Unit type from the System'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.unit-types.index', [
            'unit_types' => UnitType::all()
        ]);
    }
}
