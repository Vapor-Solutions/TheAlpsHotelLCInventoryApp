<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'dispatch_product_item');
    }

    public function getTotalCostAttribute()
    {
        $total_cost = 0;

        foreach ($this->productItems as $item) {
            $total_cost += $item->price;
        }


        return $total_cost;
    }
}
