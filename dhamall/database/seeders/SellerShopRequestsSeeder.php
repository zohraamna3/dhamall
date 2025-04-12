<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SellerShopRequestsSeeder extends Seeder
{
    public function run()
    {
        DB::table('seller_shop_requests')->insert([
            [
                'ShopId' => 1, // Example Shop ID
                'RequestStatus' => 'Approved', //
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
