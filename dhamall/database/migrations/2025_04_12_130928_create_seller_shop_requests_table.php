<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seller_shop_requests', function (Blueprint $table) {
            $table->id('RequestId');
            $table->unsignedBigInteger('ShopId');
            $table->enum('RequestStatus', ['Approved', 'Unapproved'])->default('Unapproved');
            $table->timestamps();

            $table->foreign('ShopId')->references('ShopId')->on('seller_shops');
        });
    }

    public function down()
    {
        Schema::dropIfExists('seller_shop_requests');
    }
};
