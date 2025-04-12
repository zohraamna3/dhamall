<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PaymentDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_details')->insert([
            [
                'PaymentMethod' => 'Credit Card',
                'CardNumber' => '1234567812345678', // Example card number
                'ExpiryDate' => '2025-12-31', // Example expiry date
                'CVV' => '123', // Example CVV
                'NameOnCard' => 'John Doe', // Example name
                'Zip' => '12345', // Example ZIP code
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
