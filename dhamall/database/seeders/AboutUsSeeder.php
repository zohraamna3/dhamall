<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AboutUsSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_us')->insert([
            [
                'Description' => 'Dhamall is a premier eCommerce platform specializing in high-quality earbuds. We connect audio enthusiasts with the best brands, ensuring that you find the perfect pair to match your lifestyle.',
                'Mission' => 'Our mission at Dhamall is to revolutionize the way people discover and purchase earbuds by providing a seamless and enjoyable online shopping experience, along with exceptional customer service.',
                'Vision' => 'To be the leading online retailer of earbuds in Pakistan, committed to enhancing the audio experience for every customer, and to expand our offerings to include innovative audio solutions.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
