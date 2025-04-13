<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wishlist_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('ProductId');
            $table->unsignedBigInteger('WishlistId');
            $table->timestamps();

            $table->foreign('ProductId')->references('id')->on('products');
            $table->foreign('WishlistId')->references('id')->on('wishlists');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist_items');
    }
};
