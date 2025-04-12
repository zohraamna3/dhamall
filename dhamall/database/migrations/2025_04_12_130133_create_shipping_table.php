<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Check if the table doesn't exist before creating it
        if (!Schema::hasTable('shipping')) {
            Schema::create('shipping', function (Blueprint $table) {
                $table->id('ShippingId');
                $table->enum('Method', ['Fast Shipping', 'Free Shipping']);
                $table->string('City', 100);
                $table->decimal('ShippingFee', 10, 2);
                $table->integer('EstimatedDeliveryTime');
                $table->unsignedBigInteger('AdminId');
                $table->timestamps();

                $table->foreign('AdminId')->references('UserId')->on('users');
            });
        }
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('shipping');
        Schema::enableForeignKeyConstraints();
    }
};
