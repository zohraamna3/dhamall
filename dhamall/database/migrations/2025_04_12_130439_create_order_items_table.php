<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('OrderItemId');
            $table->unsignedBigInteger('OrderId');
            $table->unsignedBigInteger('ProductId');
            $table->dateTime('OrderDate')->useCurrent();
            $table->enum('Status', ['Pending', 'Shipped', 'Completed'])->default('Pending');
            $table->integer('Quantity');
            $table->decimal('PricePerUnit', 10, 2);
            $table->decimal('TotalPrice', 10, 2)->storedAs('Quantity * PricePerUnit');
            $table->timestamps();

            $table->foreign('OrderId')->references('OrderId')->on('orders');
            $table->foreign('ProductId')->references('ProductId')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
