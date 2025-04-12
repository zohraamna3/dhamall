<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('privacy_policy', function (Blueprint $table) {
            $table->id('PolicyId');
            $table->string('Title', 150);
            $table->text('Description');
            $table->unsignedBigInteger('AdminId');
            $table->timestamps();

            $table->foreign('AdminId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('privacy_policy');
    }
};
