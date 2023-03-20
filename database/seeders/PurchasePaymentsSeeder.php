<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Purchase;
use App\Models\PurchasePayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasePaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (Purchase::count() > 1) {
            $rand = rand(1, Purchase::count());
            for ($i = 0; $i < $rand; $i++) {
                $payment = new PurchasePayment();
                $payment->purchase_id = rand(1, Purchase::count());
                while (Purchase::find($payment->purchase_id)->balance == 0) {
                    $payment->purchase_id = rand(1, Purchase::count());
                }
                $payment->payment_method_id = rand(1, PaymentMethod::count());
                $payment->amount = rand(1, Purchase::find($payment->purchase_id)->balance);
                $payment->save();
            }
        }
    }
}
