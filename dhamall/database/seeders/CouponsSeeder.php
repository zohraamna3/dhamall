<?php
// database/seeders/CouponsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CouponsSeeder extends Seeder
{
    public function run()
    {
        DB::table('coupons')->insert([
            [
                'code' => 'EARPODS10',
                'discount_value' => 10.00,
                'discount_type' => 'flat',
                'expiry_date' => Carbon::now()->addDays(30),
                'min_order_value' => 50.00,
            ],
            [
                'code' => 'BASS20',
                'discount_value' => 20.00,
                'discount_type' => 'flat',
                'expiry_date' => Carbon::now()->addDays(45),
                'min_order_value' => 100.00,
            ]
        ]);
    }
}
