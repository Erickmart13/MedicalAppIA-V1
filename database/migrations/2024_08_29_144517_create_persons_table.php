<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('cedula')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
           
            $table->date('date_of_birth');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedBigInteger('user_id'); // Asegúrate de que esta línea esté presente
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('city_id')->nullable(); // Permite valores nulos si lo necesitas
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); // Mantén la integridad referencial


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
