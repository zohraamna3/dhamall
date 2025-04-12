<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AddressSeeder extends Seeder
{
    public function run()
    {
        DB::table('Addresses')->insert([
            [
                'Country' => 'Pakistan',
                'CityOrState' => 'Karachi',
                'Street' => 'Nazarabad Street 12',
                'PostalCode' => '74000'
            ],
            [
                'Country' => 'Pakistan',
                'CityOrState' => 'Lahore',
                'Street' => 'Mall Road',
                'PostalCode' => '54000'
            ],
            [
                'Country' => 'Pakistan',
                'CityOrState' => 'Islamabad',
                'Street' => 'F-10 Markaz',
                'PostalCode' => '44000'
            ],
        ]);
    }
}
