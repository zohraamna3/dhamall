<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('UserId');
            $table->dateTime('OrderDate')->useCurrent();
            $table->enum('Status', ['Pending', 'Completed'])->default('Pending');
            $table->decimal('TotalBill', 10, 2);
            $table->timestamps();

            $table->foreign('UserId')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
