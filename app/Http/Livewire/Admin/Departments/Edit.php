<?php

namespace App\Http\Livewire\Admin\Departments;

use App\Models\ActivityLog;
use App\Models\Department;
use App\Models\Log;
use Livewire\Component;

class Edit extends Component
{
    public Department $department;

    protected $rules = [
        'department.title'=>'required|unique:departments,title'
    ];

    public function mount($id)
    {
        // $this->middleware('permission:Update Departments');
        $this->department = Department::find($id);
    }


    public function save()
    {
        $this->validate();
        $this->department->save();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Edited Department No. " . $this->department->id
        ]);

        return redirect()->route('admin.departments.index');

    }
    public function render()
    {
        return view('livewire.admin.departments.edit');
    }
}
