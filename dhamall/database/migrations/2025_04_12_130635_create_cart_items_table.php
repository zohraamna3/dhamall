<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('ProductId');
            $table->integer('Quantity');
            $table->decimal('PricePerUnit', 10, 2);
            $table->decimal('TotalPrice', 10, 2)->storedAs('Quantity * PricePerUnit');
            $table->unsignedBigInteger('CartId');
            $table->timestamps();

            $table->foreign('ProductId')->references('id')->on('products');
            $table->foreign('CartId')->references('id')->on('carts');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
