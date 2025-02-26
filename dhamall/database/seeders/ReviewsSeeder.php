<?php
// database/seeders/ReviewsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'user_id' => 1, // assuming user with id 1
                'product_id' => 1, // Apple AirPods Pro
                'rating' => 5, // 5 stars
                'comment' => 'Absolutely love these! The noise cancellation is top-notch and the sound quality is amazing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // assuming user with id 2
                'product_id' => 1, // Apple AirPods Pro
                'rating' => 4, // 4 stars
                'comment' => 'Great sound and noise cancellation, but a bit pricey.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // assuming user with id 3
                'product_id' => 2, // Sony WF-1000XM4
                'rating' => 5, // 5 stars
                'comment' => 'Amazing earbuds with superb noise cancellation and comfort. Worth every penny.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // assuming user with id 4
                'product_id' => 3, // Wired Earpods (Generic)
                'rating' => 3, // 3 stars
                'comment' => 'Good value for the price, but the sound could be better.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1, // assuming user with id 1
                'product_id' => 4, // JBL Tune 125TWS
                'rating' => 4, // 4 stars
                'comment' => 'Great sound quality and battery life. Could be more comfortable for extended use.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
