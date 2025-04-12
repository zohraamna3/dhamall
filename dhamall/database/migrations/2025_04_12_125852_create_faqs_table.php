<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id('FAQId');
            $table->text('Question');
            $table->text('Answer');
            $table->unsignedBigInteger('AdminId');
            $table->timestamps();

            $table->foreign('AdminId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('faqs');
    }
};
