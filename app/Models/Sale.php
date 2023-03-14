<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'sale_product_item')->withPivot('sale_price');
    }

    public function getTotalCostAttribute()
    {
        $total_cost = 0;

        foreach ($this->productItems as $item) {
            $total_cost += $item->pivot->sale_price;
        }


        return $total_cost;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
