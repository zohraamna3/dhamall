<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('ProductId');
            $table->string('ImageURL', 255);
            $table->timestamps();

            $table->foreign('ProductId')->references('id')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
};
