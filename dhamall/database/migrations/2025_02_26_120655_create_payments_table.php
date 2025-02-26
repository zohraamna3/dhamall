<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        // database/migrations/xxxx_xx_xx_xxxxxx_create_payments_table.php
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('payment_method');
            $table->enum('payment_status', ['pending', 'completed', 'failed']);
            $table->timestamp('payment_date');
            $table->string('transaction_id');
            $table->decimal('amount_paid', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }

};
