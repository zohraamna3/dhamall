<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Add all your seeders here
        $this->call([
            ProductsSeeder::class,
            ProductImagesSeeder::class,
            ShippingAddressesSeeder::class,
            ReviewsSeeder::class,
            // Add more seeders if needed
        ]);
    }
}
