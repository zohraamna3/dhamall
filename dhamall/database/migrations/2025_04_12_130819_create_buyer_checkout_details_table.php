<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buyer_checkout_details', function (Blueprint $table) {
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('AddressId');
            $table->unsignedBigInteger('PaymentId');
            $table->timestamps();

            $table->foreign('UserId')->references('UserId')->on('users');
            $table->foreign('AddressId')->references('AddressId')->on('addresses');
            $table->foreign('PaymentId')->references('PaymentId')->on('payment_details');

            $table->primary(['UserId', 'AddressId', 'PaymentId']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('buyer_checkout_details');
    }
};
