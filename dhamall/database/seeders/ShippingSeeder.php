<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ShippingSeeder extends Seeder
{
    public function run()
    {
        DB::table('shipping')->insert([
            [
                'Method' => 'Fast Shipping',
                'City' => 'Karachi',
                'ShippingFee' => 150.00, // Set the shipping fee for Fast Shipping in Karachi
                'EstimatedDeliveryTime' => 2, // Delivery time in days
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Method' => 'Fast Shipping',
                'City' => 'Lahore',
                'ShippingFee' => 200.00, // Set the shipping fee for Fast Shipping in Lahore
                'EstimatedDeliveryTime' => 2, // Delivery time in days
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Method' => 'Free Shipping',
                'City' => 'Karachi',
                'ShippingFee' => 0.00, // Free Shipping
                'EstimatedDeliveryTime' => 5, // Delivery time in days
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Method' => 'Free Shipping',
                'City' => 'Lahore',
                'ShippingFee' => 0.00, // Free Shipping
                'EstimatedDeliveryTime' => 5, // Delivery time in days
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Method' => 'Fast Shipping',
                'City' => 'Islamabad',
                'ShippingFee' => 250.00, // Set the shipping fee for Fast Shipping in Islamabad
                'EstimatedDeliveryTime' => 3, // Delivery time in days
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
