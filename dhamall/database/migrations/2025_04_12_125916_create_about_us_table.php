<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id('AboutUsId');
            $table->text('Description');
            $table->text('Mission');
            $table->text('Vision');
            $table->unsignedBigInteger('AdminId');
            $table->timestamps();

            $table->foreign('AdminId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_us');
    }
};
