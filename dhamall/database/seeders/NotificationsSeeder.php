<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NotificationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'UserId' => 3, // Buyer User ID
                'OrderItemId' => 1,
                'Text' => 'Your order has been placed successfully!',
                'Status' => 'Unread',
                'Type' => 'Order Placed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Buyer User ID
                'OrderItemId' => 2,
                'Text' => 'Your order has been placed successfully!',
                'Status' => 'Unread',
                'Type' => 'Order Placed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Buyer User ID
                'OrderItemId' => 3,
                'Text' => 'Your order has been placed successfully!',
                'Status' => 'Unread',
                'Type' => 'Order Placed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
