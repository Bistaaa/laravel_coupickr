<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();

            $table->string('store_name', 64);
            $table->text('description')->nullable();
            $table->string('link', 255)->unique();
            $table->unsignedBigInteger('category_id');
            $table->string('logo', 255)->nullable();
            $table->string('affiliation_code', 64);
            $table->decimal('discount', 5, 2);
            $table->decimal('commission', 5, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
