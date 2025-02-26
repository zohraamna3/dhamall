<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPaymentDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_payment_details')->insert([
            [
                'user_id' => 1,
                'payment_type' => 'Credit Card',
                'account_number' => '4111111111111111',
                'expiry_date' => '12/26',
                'cvv' => '123',
                'bank_name' => null,
                'paypal_email' => null,
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'payment_type' => 'PayPal',
                'account_number' => null,
                'expiry_date' => null,
                'cvv' => null,
                'bank_name' => null,
                'paypal_email' => 'buyer@example.com',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
