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
        Schema::create('newsletter_users', function (Blueprint $table) {
            $table->id();

            $table->string('name', 64);
            $table->string('surname', 64);
            $table->string('email', 64)->unique();
            $table->boolean('subscribed')->default(true);
            $table->string('unsubscribe_token', 64)->unique()->nullable();  // Aggiungi questa riga

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
        Schema::dropIfExists('newsletter_users');
    }
};
