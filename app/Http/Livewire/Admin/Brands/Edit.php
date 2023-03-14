<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Edit extends Component
{

    use WithFileUploads;
    public Brand $brand;
    public $logo;

    protected function rules()
    {
        return [
            'logo'=>[
                'nullable',
                'image',
                'max:1024'
            ],
            'brand.name'=>[
                'required',
                Rule::unique('brands', 'name')->ignore($this->brand->id, 'id')
            ]
        ];
    }

    public function mount($id)
    {
        $this->brand = Brand::find($id);
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
        return view('livewire.admin.brands.edit');
    }
}
