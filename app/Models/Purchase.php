<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;


    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'purchase_product_item');
    }

    public function getTotalCostAttribute()
    {
        $total_cost = 0;

        foreach ($this->productItems as $item) {
            $total_cost += $item->price;
        }


        return $total_cost;
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
