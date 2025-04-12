<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_images')->insert([
            [
                'ProductId' => 1, // Ensure this ProductId corresponds to an existing product
                'ImageURL' => 'https://example.com/images/product1-image1.jpg', // Replace with actual image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductId' => 1,
                'ImageURL' => 'https://example.com/images/product1-image2.jpg', // Replace with actual image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductId' => 2, // Ensure this ProductId corresponds to another existing product
                'ImageURL' => 'https://example.com/images/product2-image1.jpg', // Replace with actual image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductId' => 2,
                'ImageURL' => 'https://example.com/images/product2-image2.jpg', // Replace with actual image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // You can add more images for more products as needed
        ]);
    }
}
