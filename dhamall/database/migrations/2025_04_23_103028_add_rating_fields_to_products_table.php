<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('Rating', 3, 2)->default(0)->after('QuantityInStock');
            $table->unsignedInteger('ReviewCount')->default(0)->after('Rating');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['Rating', 'ReviewCount']);
        });
    }
};
