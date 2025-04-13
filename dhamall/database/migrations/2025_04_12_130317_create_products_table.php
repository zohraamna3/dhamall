<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('BrandId');
            $table->unsignedBigInteger('SellerId');
            $table->unsignedBigInteger('CategoryId');
            $table->unsignedBigInteger('ShippingId');
            $table->string('ProductName', 150);
            $table->text('Description')->nullable();
            $table->decimal('Price', 10, 2);
            $table->integer('StockQuantity')->default(0);
            $table->integer('NumberOfOrders')->default(0);
            $table->enum('ProductStatus', ['Available', 'Out of Stock', 'Discontinued'])->default('Available');
            $table->timestamps();

            $table->foreign('BrandId')->references('id')->on('brands');
            $table->foreign('SellerId')->references('id')->on('users');
            $table->foreign('CategoryId')->references('id')->on('categories');
            $table->foreign('ShippingId')->references('id')->on('shipping');
        });
    }

    public function down()
    {

        Schema::dropIfExists('products');
    }
};
