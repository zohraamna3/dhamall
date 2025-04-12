<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('returns_and_refunds', function (Blueprint $table) {
            $table->id('PolicyId');
            $table->enum('PolicyType', ['Returns', 'Refunds']);
            $table->text('Description');
            $table->unsignedBigInteger('AdminId');
            $table->timestamps();

            $table->foreign('AdminId')->references('UserId')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('returns_and_refunds');
    }
};
