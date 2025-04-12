<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserImagesSeeder extends Seeder
{
    public function run()
    {
        DB::table('user_images')->insert([
            [
                'UserId' => 1, // Another example User ID
                'ImageURL' => 'https://example.com/images/user4_profile.jpg', // Example image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 2, // Another example User ID
                'ImageURL' => 'https://example.com/images/user4_profile.jpg', // Example image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'UserId' => 3, // Example User ID
                'ImageURL' => 'https://example.com/images/user3_profile.jpg', // Example image URL
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
