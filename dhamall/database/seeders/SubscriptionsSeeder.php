<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SubscriptionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('subscriptions')->insert([
            [
                'Email' => 'user1@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Email' => 'user2@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Email' => 'user3@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Email' => 'user4@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Email' => 'user5@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
