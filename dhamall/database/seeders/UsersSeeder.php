<?php
// database/seeders/UsersSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Seller User',
                'phone_number' => '9876543210',
                'gender' => 'female',
                'dob' => '1990-07-25',
                'email' => 'seller@example.com',
                'password' => Hash::make('seller123'),
                'role' => 'seller',
            ],
            [
                'name' => 'Buyer User',
                'phone_number' => '5555555555',
                'gender' => 'male',
                'dob' => '2000-01-10',
                'email' => 'buyer@example.com',
                'password' => Hash::make('buyer123'),
                'role' => 'buyer',
            ]
        ]);
    }
}
