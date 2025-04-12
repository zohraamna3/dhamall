<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FeedbackSeeder extends Seeder
{
    public function run()
    {
        DB::table('feedback')->insert([
            [
                'UserId' => 3, // Assuming Jane Smith has UserId of 3 (buyer)
                'Rating' => 5,
                'Comment' => 'Dhamall is fantastic! I found my favorite earbuds easily, and the sound quality is amazing!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 2, // Assuming John Doe has UserId of 2 (seller)
                'Rating' => 4,
                'Comment' => 'Selling my earbuds on Dhamall has been great! The platform is supportive but could use more product listing options.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Assuming Jane Smith has UserId of 3 (buyer)
                'Rating' => 3,
                'Comment' => 'I had a decent experience shopping for earbuds, but I faced some issues with payment processing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 2, // Assuming John Doe has UserId of 2 (seller)
                'Rating' => 2,
                'Comment' => 'Had some challenges while listing my new earbuds; the support team was helpful in resolving them.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Assuming Jane Smith has UserId of 3 (buyer)
                'Rating' => 1,
                'Comment' => 'My experience was not good. I had multiple issues with my order, and the return process was confusing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
