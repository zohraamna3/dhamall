<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id('PaymentId');
            $table->enum('PaymentMethod', ['Credit Card', 'PayPal', 'Cash on Delivery'])->default('Cash on Delivery');
            $table->string('CardNumber', 16)->nullable();
            $table->date('ExpiryDate')->nullable();
            $table->string('CVV', 4)->nullable();
            $table->string('NameOnCard', 100)->nullable();
            $table->string('Zip', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
};
