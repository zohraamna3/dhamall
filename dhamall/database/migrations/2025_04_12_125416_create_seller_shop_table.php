<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seller_shops', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('SellerId');
            $table->string('ShopName', 100);
            $table->unsignedBigInteger('AddressId');
            $table->string('LocationLink', 255)->nullable();
            $table->enum('ShopStatus', ['Approved To Sell', 'Not Approved'])->default('Not Approved');
            $table->integer('TotalOrders')->default(0);
            $table->date('JoiningDate');
            $table->enum('OverallRating', ['positive', 'neutral', 'negative'])->default('neutral');
            $table->timestamps();

            $table->foreign('SellerId')->references('id')->on('users');
            $table->foreign('AddressId')->references('id')->on('addresses');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seller_shops');
    }
};
