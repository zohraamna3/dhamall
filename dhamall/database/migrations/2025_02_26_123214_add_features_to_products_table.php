<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        // database/migrations/{timestamp}_add_features_to_products_table.php

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('features')->nullable();  // Add features column
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('features');  // Remove features column
        });
    }

};
