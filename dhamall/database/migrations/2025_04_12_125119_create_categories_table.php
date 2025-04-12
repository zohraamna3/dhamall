<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id('CategoryId');
                $table->string('CategoryName', 100);
                $table->unsignedBigInteger('ParentCategoryId')->nullable();
                $table->timestamps();

                $table->foreign('ParentCategoryId')->references('CategoryId')->on('categories');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
