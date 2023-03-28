<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public User $user;
    public $roles = [];

    public function rules()
    {
        return [
            'user.name' => [
                'required',
            ],
            'user.email' => [
                'required',
                'email',
                Rule::unique('users', 'email')

            ],
            'roles' => [
                'required',

            ]
        ];
    }


    public function mount()
    {
        // $this->middleware('permission:Create users');
        $this->user = new User();
    }

    public function save()
    {
        $this->validate();

        $this->user->password = Hash::make('1234567890');
        $this->user->save();


        $this->user->roles()->attach($this->roles);
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Created User No. " . $this->user->id
        ]);

        return redirect()->route('admin.users.index');
    }
    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
