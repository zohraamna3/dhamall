<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SellerShopsSeeder extends Seeder
{
    public function run()
    {
        DB::table('seller_shops')->insert([
            [
                'SellerId' => 2, // John Doe
                'ShopName' => 'John\'s Earbud Emporium',
                'AddressId' => 1, // Assuming AddressId 1 is valid
                'LocationLink' => 'https://google/maps/xyz',
                'ShopStatus' => 'Approved To Sell',
                'TotalOrders' => 100,
                'JoiningDate' => now()->toDateString(),
                'OverallRating' => 'positive',
            ],
        ]);
    }
}
