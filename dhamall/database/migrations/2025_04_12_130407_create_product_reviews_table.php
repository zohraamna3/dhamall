<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id('ReviewId');
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('ProductId');
            $table->integer('Rating')->checkBetween(1, 5);
            $table->text('Comment')->nullable();
            $table->enum('Sentiment', ['Positive', 'Neutral', 'Negative'])->default('Neutral');
            $table->date('PostedOn');
            $table->timestamps();

            $table->foreign('UserId')->references('UserId')->on('users');
            $table->foreign('ProductId')->references('ProductId')->on('products');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_reviews');
    }
};
