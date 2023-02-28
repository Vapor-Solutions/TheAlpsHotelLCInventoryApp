<?php

namespace App\Http\Livewire\Admin\Customers;

use App\Models\Customer;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Customer $customer;

    protected function rules()
    {
        return [
            'customer.name' => 'required',
            'customer.email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($this->customer->id, 'id')
            ],
            'customer.phone_number' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                Rule::unique('customers', 'phone_number')->ignore($this->customer->id, 'id')
            ],
            'customer.address' => 'required',
            'customer.company_name' => 'nullable',
            'customer.kra_pin' => 'required',
        ];
    }


    public function mount($id)
    {
        $this->customer = Customer::find($id);
    }

    public function save()
    {
        $this->validate();

        $this->customer->save();

        return redirect()->route('admin.customers.index');
    }


    public function render()
    {
        return view('livewire.admin.customers.edit');
    }
}
