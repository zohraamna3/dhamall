<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BuyerCheckoutDetailsSeeder extends Seeder
{
    public function run()
    {
        DB::table('buyer_checkout_details')->insert([
            [
                'UserId' => 3, // Buyer User ID
                'AddressId' => 1, // Example Address ID
                'PaymentId' => 1, // Example Payment ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
