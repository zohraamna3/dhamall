<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('brands')) {
            Schema::create('brands', function (Blueprint $table) {
                $table->id('BrandId');
                $table->string('Name', 100);
                $table->string('LogoURL', 255)->nullable();
                $table->text('Description')->nullable();
                $table->string('WebsiteURL', 255)->nullable();
                $table->unsignedBigInteger('AdminId');
                $table->timestamps();

                $table->foreign('AdminId')->references('UserId')->on('users');
            });
        }
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('brands');
        Schema::enableForeignKeyConstraints();
    }
};
