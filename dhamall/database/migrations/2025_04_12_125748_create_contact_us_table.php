<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id('MessageId');
            $table->string('Name', 100);
            $table->string('Email', 255);
            $table->text('Message');
            $table->enum('UserRole', ['buyer', 'seller', 'visitor']);
            $table->enum('Status', ['Pending', 'Reviewed', 'Responded'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
};
