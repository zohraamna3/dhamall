<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        DB::table('Orders')->insert([
            [
                'UserId' => 3, // Jane Smith
                'OrderDate' => now(),
                'Status' => 'Pending',
                'TotalBill' => 649.98
            ],
            [
                'UserId' => 3, // Jane Smith
                'OrderDate' => now(),
                'Status' => 'Pending',
                'TotalBill' => 249.99
            ],
        ]);
    }
}
