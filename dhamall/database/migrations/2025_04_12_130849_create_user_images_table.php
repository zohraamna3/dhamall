<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_images', function (Blueprint $table) {
            $table->id('ImageId');
            $table->unsignedBigInteger('UserId');
            $table->string('ImageURL', 255);
            $table->timestamps();

            $table->foreign('UserId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_images');
    }
};
