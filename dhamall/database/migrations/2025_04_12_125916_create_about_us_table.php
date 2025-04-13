<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id('id');
            $table->text('Description');
            $table->text('Mission');
            $table->text('Vision');
            $table->unsignedBigInteger('AdminId');
            $table->timestamps();

            $table->foreign('AdminId')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_us');
    }
};
