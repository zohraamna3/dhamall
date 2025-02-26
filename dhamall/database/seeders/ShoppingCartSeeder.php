<?php
// database/seeders/ShoppingCartSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoppingCartSeeder extends Seeder
{
    public function run()
    {
        // Sample data for cart
        DB::table('shopping_cart')->insert([
            [
                'user_id' => 1, // assuming user with id 1
                'product_id' => 1, // assuming product with id 1
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 2, // assuming product with id 2
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
