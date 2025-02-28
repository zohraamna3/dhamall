<?php

namespace Database\Seeders;

use App\Models\UserPaymentDetail;
use Illuminate\Database\Seeder;

class UserPaymentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample payment details
        UserPaymentDetail::create([
            'user_id' => 1,
            'payment_type' => 'credit_card',
            'account_number' => '4111111111111111',
            'expiry_date' => '12/25',
            'cvv' => '123',
            'bank_name' => 'Example Bank',
            'paypal_email' => null,
            'is_default' => true,
            'card_name' => 'John Doe', // Add this
            'country' => 'USA',        // Add this
        ]);

        UserPaymentDetail::create([
            'user_id' => 2,
            'payment_type' => 'paypal',
            'account_number' => null,
            'expiry_date' => null,
            'cvv' => null,
            'bank_name' => null,
            'paypal_email' => 'user2@example.com',
            'is_default' => true,
            'card_name' => null,        // Add this
            'country' => 'Canada',      // Add this
        ]);

        // Add more sample data as needed
    }
}