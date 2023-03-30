<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function productDescriptions()
    {
        return $this->belongsToMany(ProductDescription::class, 'product_purchase_order')->withPivot('quantity');
    }

    public function getTotalCostAttribute()
    {
        $total_cost = 0;

        foreach ($this->productDescriptions as $item) {
            $total_cost += ($item->price * $item->pivot->quantity);
        }


        return $total_cost;
    }


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
