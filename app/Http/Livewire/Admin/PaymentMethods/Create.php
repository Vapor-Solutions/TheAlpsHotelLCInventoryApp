<?php

namespace App\Http\Livewire\Admin\PaymentMethods;

use App\Models\PaymentMethod;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    public PaymentMethod $method;
    public $logo;
    use WithFileUploads;

    protected $rules = [
        'method.title' => 'required',
        'logo' => 'nullable|image|max:1536',
    ];


    public function mount()
    {
        $this->method = new PaymentMethod();
    }


    public function save()
    {
        $this->validate();

        if (isset($this->logo)) {
            $this->logo->storeAs('payment_method_logos', Str::slug($this->method->title) . '.' . $this->logo->extension());
            $this->method->logo_path = 'payment_method_logos/' . Str::slug($this->method->title) . '.' . $this->logo->extension();
        }
        $this->method->save();

        return redirect()->route('admin.payment-methods.index');
    }
    public function render()
    {
        return view('livewire.admin.payment-methods.create');
    }
}
