<?php

namespace App\Http\Livewire\Admin\Dispatches;

use App\Models\Dispatch;
use Livewire\Component;

class Show extends Component
{
    public Dispatch $dispatch;
    // public $productItems;

    public function mount($id)
    {
        $this->dispatch = Dispatch::find($id);

    }
    public function render()
    {
        return view('livewire.admin.dispatches.show');
    }
}
