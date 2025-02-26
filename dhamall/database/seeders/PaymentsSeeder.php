<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            [
                'order_id' => 1,
                'payment_method' => 'Credit Card',
                'payment_status' => 'completed',
                'payment_date' => Carbon::now(),
                'transaction_id' => 'TX1234567890',
                'amount_paid' => 249.99,
            ],
            [
                'order_id' => 2,
                'payment_method' => 'PayPal',
                'payment_status' => 'completed',
                'payment_date' => Carbon::now()->subDays(1),
                'transaction_id' => 'TX9876543210',
                'amount_paid' => 39.98, // 2 wired earpods
            ]
        ]);
    }
}
