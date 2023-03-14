<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public Brand $brand;
    public $logo;

    protected $rules = [
        'logo' => 'nullable|image|max:1024',
        'brand.name' => 'required|unique:brands,name'
    ];

    public function mount()
    {
        $this->brand = new Brand();
    }

    public function save()
    {
        $this->validate();

        if (isset($this->logo)) {
            $this->logo->storeAs('brand_logos', Str::slug($this->brand->name) . '.' . $this->logo->extension());
            $this->brand->logo_path = 'brand_logos/' . Str::slug($this->brand->name) . '.' . $this->logo->extension();
        }

        $this->brand->save();

        return redirect()->route('admin.brands.index');
    }

    public function render()
    {
        return view('livewire.admin.brands.create');
    }
}
