<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CartItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('cart_items')->insert([
            [
                'ProductId' => 1, // Sony WF-1000XM4
                'Quantity' => 2, // Quantity purchased
                'PricePerUnit' => 399.99, // Price per unit
                'CartId' => 1, // Cart for UserId 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductId' => 2, // Samsung Galaxy Buds Pro
                'Quantity' => 1, // Quantity purchased
                'PricePerUnit' => 249.99, // Price per unit
                'CartId' => 1, // Cart for UserId 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
