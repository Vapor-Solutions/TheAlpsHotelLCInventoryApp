<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;


    protected $appends = [
        'paid_out',
        'paid_in'
    ];

    public function defaultBrandLogoUrl()
    {
        $name = trim(collect(explode(' ', $this->title))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name ?? $this->title) . '&color=7F9CF5&background=EBF4FF';
    }
    public function getLogoUrlAttribute()
    {
        return $this->logo_path ?
            env('APP_URL') . '/' . $this->logo_path
            : $this->defaultBrandLogoUrl();
    }


    public function salesPayments()
    {
        return $this->hasMany(SalesPayment::class);
    }
    public function purchasePayments()
    {
        return $this->hasMany(PurchasePayment::class);
    }

    public function getPaidInAttribute()
    {
        $total = 0;
        foreach ($this->salesPayments as $payment) {
            $total += $payment->amount;
        }

        return $total;
    }
    public function getPaidOutAttribute()
    {
        $total = 0;
        foreach ($this->purchasePayments as $payment) {
            $total += $payment->amount;
        }

        return $total;
    }

    public function hasPurchasePayments()
    {
        return $this->purchasePayments->count() > 0;
    }
    public function hasSalesPayments()
    {
        return $this->salesPayments->count() > 0;
    }
}
