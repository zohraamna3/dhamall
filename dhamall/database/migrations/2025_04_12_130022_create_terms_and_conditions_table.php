<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('terms_and_conditions', function (Blueprint $table) {
            $table->id('id');
            $table->string('Title', 150);
            $table->text('Description');
            $table->unsignedBigInteger('AdminId');
            $table->timestamps();

            $table->foreign('AdminId')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('terms_and_conditions');
    }
};
