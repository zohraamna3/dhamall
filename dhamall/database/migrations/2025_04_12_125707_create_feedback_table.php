<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id('FeedbackId');
            $table->unsignedBigInteger('UserId');
            $table->integer('Rating')->checkBetween(1, 5);
            $table->text('Comment')->nullable();
            $table->timestamps();

            $table->foreign('UserId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
