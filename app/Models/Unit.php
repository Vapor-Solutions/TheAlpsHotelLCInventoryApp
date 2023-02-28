<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unit extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }


    public function getEquivalenceAttribute()
    {

    }
}
