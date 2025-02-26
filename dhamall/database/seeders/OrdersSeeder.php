<?php

// database/seeders/OrdersSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'order_date' => '2025-02-26 13:10:44', // ✅ Correct format
                'payment_method' => 'Credit Card',
                'shipping_address' => '123 Main St, City, Country',
                'status' => 'pending',
                'total_amount' => 249.99,
                'user_id' => 2,
            ],
            [
                'order_date' => '2025-02-25 13:10:44', // ✅ Correct format
                'payment_method' => 'PayPal',
                'shipping_address' => '456 Second St, City, Country',
                'status' => 'completed',
                'total_amount' => 99.99,
                'user_id' => 1,
            ]
        ]);
    }
}
