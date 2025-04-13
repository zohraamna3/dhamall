<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buyer_checkout_details', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('AddressId')->nullable();
            $table->unsignedBigInteger('PaymentId')->nullable();
            $table->timestamps();

            $table->foreign('UserId')->references('id')->on('users');
            $table->foreign('AddressId')->references('id')->on('addresses');
            $table->foreign('PaymentId')->references('id')->on('payment_details');


        });
    }

    public function down()
    {
        Schema::dropIfExists('buyer_checkout_details');
    }
};
