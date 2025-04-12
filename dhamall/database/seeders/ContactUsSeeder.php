<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ContactUsSeeder extends Seeder
{
    public function run()
    {
        DB::table('contact_us')->insert([
            [
                'Name' => 'Jane Smith', // Buyer example
                'Email' => 'jane@example.com',
                'Message' => 'I would like to know more about the warranty on my earbuds purchased from Dhamall.',
                'UserRole' => 'buyer', // aligns with Jane Smith's role
                'Status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'John Doe', // Seller example
                'Email' => 'john@example.com',
                'Message' => 'What are the shipping options available for my earbuds on Dhamall?',
                'UserRole' => 'seller', // aligns with John Doe's role
                'Status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Alice Johnson', // Example visitor
                'Email' => 'alice@example.com',
                'Message' => 'I am interested in becoming a seller for earbuds on Dhamall. Can you assist me?',
                'UserRole' => 'visitor', // Not a defined user, role as visitor
                'Status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Diana Prince', // Example buyer
                'Email' => 'diana@example.com',
                'Message' => 'I received the wrong model of earbuds in my last order. How can I resolve this?',
                'UserRole' => 'visitor', // aligns with Diana's role
                'Status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Name' => 'Edward Elric', // Example visitor
                'Email' => 'edward@example.com',
                'Message' => 'I have a suggestion for improving the filter options while browsing earbuds on Dhamall.',
                'UserRole' => 'visitor', // Not a defined user, role as visitor
                'Status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
