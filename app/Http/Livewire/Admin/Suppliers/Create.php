<?php

namespace App\Http\Livewire\Admin\Suppliers;

use App\Models\Supplier;
use Livewire\Component;

class Create extends Component
{

    public Supplier $supplier;

    protected $rules = [
        'supplier.name'=>'required',
        'supplier.email'=>'required|email|unique:suppliers,email',
        'supplier.phone_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:suppliers,phone_number',
        'supplier.address'=>'required',
        'supplier.company_name'=>'nullable',
        'supplier.kra_pin'=>'required',
    ];

    public function mount()
    {
        $this->supplier = new Supplier();
    }

    public function save()
    {
        $this->validate();

        $this->supplier->save();

        return redirect()->route('admin.suppliers.index');
    }


    public function render()
    {
        return view('livewire.admin.suppliers.create');
    }
}
