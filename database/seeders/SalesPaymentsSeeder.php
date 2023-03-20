<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Sale;
use App\Models\SalesPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesPaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Sale::count() > 1) {
            $rand = rand(1, Sale::count());
            for ($i = 0; $i < $rand; $i++) {
                $payment = new SalesPayment();
                $payment->sale_id = rand(1, Sale::count());
                while (Sale::find($payment->sale_id)->balance == 0) {
                    $payment->sale_id = rand(1, Sale::count());
                }
                $payment->payment_method_id = rand(1, PaymentMethod::count());
                $payment->amount = rand(1, Sale::find($payment->sale_id)->balance);
                $payment->save();
            }
        }
    }
}
