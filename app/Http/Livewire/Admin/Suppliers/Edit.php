<?php

namespace App\Http\Livewire\Admin\Suppliers;

use App\Models\Supplier;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Supplier $supplier;

    protected function rules()
    {
        return [
            'supplier.name' => 'required',
            'supplier.email' => [
                'required',
                'email',
                Rule::unique('suppliers', 'email')->ignore($this->supplier->id, 'id')
            ],
            'supplier.phone_number' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                Rule::unique('suppliers', 'phone_number')->ignore($this->supplier->id, 'id')
            ],
            'supplier.address' => 'required',
            'supplier.company_name' => 'nullable',
            'supplier.kra_pin' => 'required',
        ];
    }


    public function mount($id)
    {
        $this->supplier = Supplier::find($id);
    }

    public function save()
    {
        $this->validate();

        $this->supplier->save();

        return redirect()->route('admin.suppliers.index');
    }


    public function render()
    {
        return view('livewire.admin.suppliers.edit');
    }
}
