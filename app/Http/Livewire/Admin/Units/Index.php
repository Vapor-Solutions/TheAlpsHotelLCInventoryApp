<?php

namespace App\Http\Livewire\Admin\Units;

use App\Models\Unit;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        // $this->middleware('permission:Delete Units')->only('delete');
    }
    public function delete($id)
    {
        $unit = Unit::find($id);

        if (count($unit->productDescriptions) == 0) {
            if ($unit->logo_path) {
                unlink($unit->logo_path);
            }

            $unit->delete();

            $this->emit('done', [
                'success' => 'Successfully Deleted this Unit'
            ]);
        } else {
            $this->emit('done', [
                'warning' => 'This Unit has Products Attached to it'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.units.index',[
            'units'=>Unit::all()
        ]);
    }
}
