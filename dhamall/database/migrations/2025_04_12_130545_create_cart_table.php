<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id('CartId');
            $table->unsignedBigInteger('UserId');
            $table->timestamps();

            $table->foreign('UserId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
