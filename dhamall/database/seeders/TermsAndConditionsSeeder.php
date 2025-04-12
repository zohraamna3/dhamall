<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TermsAndConditionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('terms_and_conditions')->insert([
            [
                'Title' => 'Terms of Use',
                'Description' => 'By using the Dhamall platform, you agree to comply with all terms and conditions listed herein. Dhamall reserves the right to amend these terms at any time. Please read carefully before making a purchase.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'Purchase Agreement',
                'Description' => 'All purchases made on Dhamall are final. Once an order is placed, you agree to pay the total price for the items ordered, including any applicable taxes and shipping fees.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'Refunds and Returns',
                'Description' => 'Dhamall offers a 30-day return policy on most items. Products must be unused and in their original packaging. To initiate a return, please contact our support team with your order details.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'Privacy Policy',
                'Description' => 'Dhamall is committed to protecting your privacy. We collect and use your personal information in accordance with our Privacy Policy, which you can review on our website.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
