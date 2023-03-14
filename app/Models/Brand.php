<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithFileUploads;

class Brand extends Model
{
    use HasFactory;
    use WithFileUploads;

    public function productDescriptions()
    {
        return $this->hasMany(ProductDescription::class);
    }

    public function getLogoUrlAttribute()
    {
        return $this->logo_path ?
            env('APP_URL') . '/' . $this->logo_path
            : $this->defaultBrandLogoUrl();
    }

    protected function defaultBrandLogoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=fff&background=4f100e';
    }
}
