<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'OrderId' => 1, // Corresponds to the first order from Jane Smith
                'ProductId' => 1, // Sony WF-1000XM4
                'OrderDate' => now(),
                'Status' => 'Pending',
                'Quantity' => 1,
                'PricePerUnit' => 399.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'OrderId' => 1, // Corresponding to the same order
                'ProductId' => 2, // Samsung Galaxy Buds Pro
                'OrderDate' => now(),
                'Status' => 'Pending',
                'Quantity' => 1, // Quantity of the product in this order
                'PricePerUnit' => 249.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'OrderId' => 2, // Corresponds to the second order from Jane Smith
                'ProductId' => 2, // Sony WF-1000XM4
                'OrderDate' => now(),
                'Status' => 'Pending',
                'Quantity' => 1,
                'PricePerUnit' => 249.99,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
