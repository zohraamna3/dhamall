<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BrandsSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->insert([
            [
                'Name' => 'Sony',
                'LogoURL' => 'https://example.com/logos/sony.png', // Replace with actual logo URL
                'Description' => 'Sony offers innovative audio solutions and stylish designs, ideal for audiophiles and casual listeners alike.',
                'WebsiteURL' => 'https://www.sony.com',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Bose',
                'LogoURL' => 'https://example.com/logos/bose.png', // Replace with actual logo URL
                'Description' => 'Bose is renowned for its noise-cancelling technology and premium sound quality, perfect for music lovers.',
                'WebsiteURL' => 'https://www.bose.com',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Apple',
                'LogoURL' => 'https://example.com/logos/apple.png', // Replace with actual logo URL
                'Description' => 'Apple provides seamless integration with its devices, offering a premium sound experience with AirPods and more.',
                'WebsiteURL' => 'https://www.apple.com',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'JBL',
                'LogoURL' => 'https://example.com/logos/jbl.png', // Replace with actual logo URL
                'Description' => 'JBL is known for its vibrant sound and portable speakers, perfect for any music enthusiast on the go.',
                'WebsiteURL' => 'https://www.jbl.com',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Sennheiser',
                'LogoURL' => 'https://example.com/logos/sennheiser.png', // Replace with actual logo URL
                'Description' => 'Sennheiser offers high-quality audio and professional headphones, suitable for studio recordings and casual listening.',
                'WebsiteURL' => 'https://www.sennheiser.com',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
