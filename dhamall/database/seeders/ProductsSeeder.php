<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        DB::table('Products')->insert([
            [
                'BrandId' => 1, // Sony
                'SellerId' => 2, // John Doe
                'CategoryId' => 1, // Earbuds
                'ShippingId' => 1, // Assuming Fast Shipping
                'ProductName' => 'Sony WF-1000XM4',
                'Description' => 'Premium noise-canceling earbuds',
                'Price' => 399.99,
                'StockQuantity' => 50,
                'NumberOfOrders' => 0,
                'ProductStatus' => 'Available',
            ],
            [
                'BrandId' => 2, // Samsung
                'SellerId' => 2, // John Doe
                'CategoryId' => 1, // Earbuds
                'ShippingId' => 2, // Assuming Free Shipping
                'ProductName' => 'Samsung Galaxy Buds Pro',
                'Description' => 'High-quality audio with a comfortable fit',
                'Price' => 249.99,
                'StockQuantity' => 75,
                'NumberOfOrders' => 0,
                'ProductStatus' => 'Available',
            ],
        ]);
    }
}
