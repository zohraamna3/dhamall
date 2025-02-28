<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCardNameAndCountryToUserPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_payment_details', function (Blueprint $table) {
            // Add card_name column
            $table->string('card_name')->nullable()->after('paypal_email');

            // Add country column
            $table->string('country')->nullable()->after('card_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_payment_details', function (Blueprint $table) {
            // Drop the columns if the migration is rolled back
            $table->dropColumn('card_name');
            $table->dropColumn('country');
        });
    }
}