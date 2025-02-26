<?php
// database/seeders/ProductsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Apple AirPods Pro',
                'description' => 'Apple AirPods Pro with active noise cancellation.',
                'price' => 249.99,
                'quantity_in_stock' => 50,
                'category_id' => 2, // Wireless Earpods
                'features' => 'Active noise cancellation, Transparency mode, H1 chip, 4.5 hours of listening time.',
            ],
            [
                'name' => 'Sony WF-1000XM4',
                'description' => 'Sony WF-1000XM4 True Wireless Noise Cancelling Earbuds.',
                'price' => 279.99,
                'quantity_in_stock' => 40,
                'category_id' => 2, // Wireless Earpods
                'features' => 'Industry-leading noise cancellation, Long battery life, Clear call quality.',
            ],
            [
                'name' => 'Wired Earpods (Generic)',
                'description' => 'High-quality wired earpods with 3.5mm jack.',
                'price' => 19.99,
                'quantity_in_stock' => 100,
                'category_id' => 3, // Wired Earpods
                'features' => '3.5mm audio jack, Soft ear cushions, Tangle-free cable.',
            ],
            [
                'name' => 'JBL Tune 125TWS',
                'description' => 'JBL Tune 125TWS True Wireless Earpods with JBL Pure Bass Sound.',
                'price' => 99.99,
                'quantity_in_stock' => 30,
                'category_id' => 2, // Wireless Earpods
                'features' => 'JBL Pure Bass sound, 32 hours of battery life, Comfortable fit.',
            ]
        ]);
    }
}
