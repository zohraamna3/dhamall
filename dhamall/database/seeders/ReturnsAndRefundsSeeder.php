<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReturnsAndRefundsSeeder extends Seeder
{
    public function run()
    {
        DB::table('returns_and_refunds')->insert([
            [
                'PolicyType' => 'Returns',
                'Description' => 'You can return any item within 30 days of purchase. The item must be in its original condition and packaging.',
                'AdminId' => 1, // Assuming AdminUser has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'PolicyType' => 'Refunds',
                'Description' => 'Refunds will be processed within 7 business days after the returned item is received.',
                'AdminId' => 1, // Assuming AdminUser has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'PolicyType' => 'Returns',
                'Description' => 'For defective items, returns are accepted within 60 days and full refund will be processed after inspection.',
                'AdminId' => 1, // Assuming AdminUser has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'PolicyType' => 'Refunds',
                'Description' => 'Refund requests must be made within 14 days after receiving the product. Once approved, the refund will be initiated.',
                'AdminId' => 1, // Assuming AdminUser has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
