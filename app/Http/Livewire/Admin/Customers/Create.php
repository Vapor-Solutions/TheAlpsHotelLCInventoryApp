<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\ActivityLog;
use App\Models\Customer;
use Livewire\Component;

class Create extends Component
{

    public Customer $customer;

    protected $rules = [
        'customer.name'=>'required',
        'customer.email'=>'required|email|unique:customers,email',
        'customer.phone_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:customers,phone_number',
        'customer.address'=>'required',
        'customer.company_name'=>'nullable',
        'customer.kra_pin'=>'required',
    ];

    public function mount()
    {
        $this->middleware('permission:Create Customers');
        $this->customer = new Customer();
    }

    public function save()
    {
        $this->validate();

        $this->customer->save();

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'payload' => "Created Customer No. " . $this->customer->id
        ]);

        return redirect()->route('admin.customers.index');
    }


    public function render()
    {
        return view('livewire.admin.customers.create');
    }
}
