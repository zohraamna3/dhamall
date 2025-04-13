<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('OrderItemId');
            $table->string('Text', 255);
            $table->enum('Status', ['Unread', 'Viewed', 'Cleared'])->default('Unread');
            $table->enum('Type', ['Order Placed', 'Order Shipped', 'Order Delivered']);
            $table->timestamps();

            $table->foreign('UserId')->references('id')->on('users');
            $table->foreign('OrderItemId')->references('id')->on('order_items'); // Correct foreign key
        });
    }

    public function down()
    {

        Schema::dropIfExists('notifications');
    }
};
