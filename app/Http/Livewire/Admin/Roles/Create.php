<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public Role $role;
    public $permissions = [];

    public function rules()
    {
        return [
            'role.title' => [
                'required',
                Rule::unique('roles', 'title'),
            ],
            'permissions' => [
                'required',
            ]
        ];
    }


    public function mount()
    {
        $this->role = new Role();
    }

    public function save()
    {
        $this->validate();
        $this->role->save();

        $this->role->permissions()->attach($this->permissions);

        return redirect()->route('admin.roles.index');
    }

    public function render()
    {
        return view('livewire.admin.roles.create');
    }
}
