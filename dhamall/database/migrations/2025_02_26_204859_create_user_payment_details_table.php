<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('payment_type'); // e.g., Credit Card, PayPal, Bank Transfer
            $table->string('account_number')->nullable(); // Card or account number
            $table->string('expiry_date')->nullable(); // Expiry date for cards
            $table->string('cvv')->nullable(); // CVV for cards
            $table->string('bank_name')->nullable(); // For bank transfers
            $table->string('paypal_email')->nullable(); // If PayPal is used
            $table->boolean('is_default')->default(false); // Mark as default payment method
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_payment_details');
    }
};
