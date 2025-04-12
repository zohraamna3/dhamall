<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PrivacyPolicySeeder extends Seeder
{
    public function run()
    {
        DB::table('privacy_policy')->insert([
            [
                'Title' => 'Privacy Policy Overview',
                'Description' => 'At Dhamall, your privacy is our priority. We are committed to protecting the personal information you provide when using our website and services. This policy outlines how we collect, use, and safeguard your data.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'Information We Collect',
                'Description' => 'We collect various types of information, including personal details (name, email address, shipping address) and transaction details when you place an order. We may also collect information about your usage of our website through cookies or analytics tools.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'How We Use Your Information',
                'Description' => 'Your information may be used to process your orders, communicate with you about your account, provide customer support, and improve our services. We do not sell or share your personal information with third parties for marketing purposes.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Title' => 'Your Rights',
                'Description' => 'You have the right to access, update, or delete your personal information at any time. If you wish to exercise these rights or have any questions regarding our privacy practices, please contact us.',
                'AdminId' => 1, // Assuming the Admin User has UserId of 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
