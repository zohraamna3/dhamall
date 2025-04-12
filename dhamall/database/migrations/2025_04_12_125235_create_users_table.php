<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserId');
            $table->enum('UserRole', ['admin', 'buyer', 'seller']);
            $table->string('Name', 100);
            $table->string('PhoneNumber', 15)->nullable();
            $table->enum('Gender', ['Male', 'Female', 'Other'])->nullable();
            $table->date('DateOfBirth')->nullable();
            $table->string('EmailAddress', 255)->unique();
            $table->string('Password');
            $table->string('ImageURL', 255)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
