<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CartSeeder extends Seeder
{
    public function run()
    {
        DB::table('carts')->insert([
            [
                'UserId' => 3, // Assuming UserId refers to the primary user
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
