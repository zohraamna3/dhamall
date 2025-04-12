<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class WishlistItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('wishlist_items')->insert([
            [
                'ProductId' => 1, // Sony WF-1000XM4
                'WishlistId' => 1, // Wishlist for UserId 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductId' => 2, // Samsung Galaxy Buds Pro
                'WishlistId' => 1, // Wishlist for UserId 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
