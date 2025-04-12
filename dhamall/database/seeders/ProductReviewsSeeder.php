<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductReviewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_reviews')->insert([
            [
                'UserId' => 3, // Jane Smith (Buyer)
                'ProductId' => 1, // Sony WF-1000XM4
                'Rating' => 5,
                'Comment' => 'Excellent noise cancellation and sound quality!',
                'Sentiment' => 'Positive',
                'PostedOn' => now()->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Assuming this UserId corresponds to Jane Smith (Buyer)
                'ProductId' => 1, // Sony WF-1000XM4
                'Rating' => 4,
                'Comment' => 'Great earbuds, but a bit pricey.',
                'Sentiment' => 'Positive',
                'PostedOn' => now()->subDays(1)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Jane Smith (Buyer)
                'ProductId' => 2, // Samsung Galaxy Buds Pro
                'Rating' => 3,
                'Comment' => 'Decent earbuds, but not as good as expected.',
                'Sentiment' => 'Neutral',
                'PostedOn' => now()->subDays(2)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Jane Smith (Buyer)
                'ProductId' => 2, // Samsung Galaxy Buds Pro
                'Rating' => 5,
                'Comment' => 'My best-selling product! Customers love it!',
                'Sentiment' => 'Positive',
                'PostedOn' => now()->subDays(3)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Jane Smith (Buyer)
                'ProductId' => 1, // Sony WF-1000XM4
                'Rating' => 1,
                'Comment' => 'Disappointed with the sound quality; not what I expected.',
                'Sentiment' => 'Negative',
                'PostedOn' => now()->subDays(4)->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
