<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_descripton_id',
        'sku_number',
        'price'
    ];


    public function productDescription()
    {
        return $this->belongsTo(ProductDescription::class);
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'purchase_product_item');
    }
    public function dispatches()
    {
        return $this->belongsToMany(Dispatch::class, 'dispatch_product_item');
    }

    public function getIsDispatchedAttribute()
    {
        return count($this->dispatches) > 0;
    }
}
