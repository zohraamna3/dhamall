<?php
// database/seeders/ShippingAddressesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingAddressesSeeder extends Seeder
{
    public function run()
    {
        DB::table('shipping_addresses')->insert([
            [
                'user_id' => 1, // Seller user ID
                'address_line1' => '123 Main St',
                'address_line2' => 'Apt 4B',
                'city' => 'New York',
                'state' => 'NY',
                'zip_code' => '10001',
                'country' => 'USA',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Buyer user ID
                'address_line1' => '456 Oak Ave',
                'address_line2' => null,
                'city' => 'Los Angeles',
                'state' => 'CA',
                'zip_code' => '90001',
                'country' => 'USA',
                'is_default' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
