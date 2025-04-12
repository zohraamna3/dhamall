<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ShippingPolicySeeder extends Seeder
{
    public function run()
    {
        DB::table('shipping_policy')->insert([
            [
                'Title' => 'Fast Shipping',
                'Description' => 'Dhamall offers fast shipping options for customers needing quick delivery. Orders are typically delivered within 1-3 business days. Additional charges may apply based on your location.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'Free Shipping',
                'Description' => 'Enjoy free shipping on orders over [insert amount]. Orders will be delivered within 5-7 business days. Please note that free shipping may not be available for remote locations.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
