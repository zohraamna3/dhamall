<?php
// database/seeders/OrderItemsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'product_id' => 1, // Apple AirPods Pro
                'quantity' => 1,
                'price_at_time_of_order' => 249.99,
            ],
            [
                'order_id' => 2,
                'product_id' => 3, // Wired Earpods (Generic)
                'quantity' => 2,
                'price_at_time_of_order' => 19.99,
            ]
        ]);
    }
}
