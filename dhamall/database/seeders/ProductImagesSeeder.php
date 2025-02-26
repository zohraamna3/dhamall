<?php
// database/seeders/ProductImagesSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_images')->insert([
            [
                'product_id' => 1, // Apple AirPods Pro
                'image_url' => 'https://example.com/images/apple_airpods_pro_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1, // Apple AirPods Pro
                'image_url' => 'https://example.com/images/apple_airpods_pro_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2, // Sony WF-1000XM4
                'image_url' => 'https://example.com/images/sony_wf_1000xm4_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2, // Sony WF-1000XM4
                'image_url' => 'https://example.com/images/sony_wf_1000xm4_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3, // Wired Earpods (Generic)
                'image_url' => 'https://example.com/images/wired_earpods_generic_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4, // JBL Tune 125TWS
                'image_url' => 'https://example.com/images/jbl_tune_125tws_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
