<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('Users')->insert([
            [
                'UserRole' => 'admin',
                'Name' => 'Admin User',
                'PhoneNumber' => '03012345678',
                'Gender' => 'Male',
                'DateOfBirth' => '1985-06-15',
                'EmailAddress' => 'admin@example.com',
                'Password' => Hash::make('password'),
                'ImageURL' => null,
            ],
            [
                'UserRole' => 'seller',
                'Name' => 'John Doe',
                'PhoneNumber' => '03123456789',
                'Gender' => 'Male',
                'DateOfBirth' => '1990-07-20',
                'EmailAddress' => 'john@example.com',
                'Password' => Hash::make('password'),
                'ImageURL' => null,
            ],
            [
                'UserRole' => 'buyer',
                'Name' => 'Jane Smith',
                'PhoneNumber' => '03234567890',
                'Gender' => 'Female',
                'DateOfBirth' => '1995-04-25',
                'EmailAddress' => 'jane@example.com',
                'Password' => Hash::make('password'),
                'ImageURL' => null,
            ],
        ]);
    }
}
