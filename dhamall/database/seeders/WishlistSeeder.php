<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    public function run()
    {
        DB::table('wishlist')->insert([
            [
                'user_id' => 2, // Buyer User
                'product_id' => 1, // Apple AirPods Pro
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Buyer User
                'product_id' => 3, // Wired Earpods (Generic)
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
