<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FaqsSeeder extends Seeder
{
    public function run()
    {
        DB::table('faqs')->insert([
            [
                'Question' => 'What is the battery life of earbuds available at Dhamall?',
                'Answer' => 'Our earbuds typically offer a battery life of up to 8 hours on a single charge, complemented by a charging case that provides an additional 24 hours of listening time.',
                'AdminId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Question' => 'Are Dhamall earbuds sweat-resistant?',
                'Answer' => 'Yes, all earbuds available at Dhamall are designed to be sweat and water-resistant, making them ideal for workouts and outdoor activities.',
                'AdminId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Question' => 'Can I use Dhamall earbuds with multiple devices?',
                'Answer' => 'Absolutely! Our earbuds support multi-device connectivity, enabling you to switch between devices seamlessly.',
                'AdminId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Question' => 'Do Dhamall earbuds come with a warranty?',
                'Answer' => 'Yes, we provide a one-year warranty on all our earbuds, covering manufacturing defects.',
                'AdminId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Question' => 'What is Dhamall’s return policy for earbuds?',
                'Answer' => 'You can return unopened earbuds within 30 days for a full refund. If opened, products can be returned within 14 days for an exchange or store credit.',
                'AdminId' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
