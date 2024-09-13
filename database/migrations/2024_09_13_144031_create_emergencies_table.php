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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Relación con la tabla 'user'
            $table->integer('heart_rate'); // Frecuencia cardíaca
            $table->integer('respiratory_rate'); // Frecuencia respiratoria
            $table->string('blood_pressure'); // Presión arterial (Ej: 120/80)
            $table->decimal('temperature', 4, 2); // Temperatura (Ej: 37.5)
            $table->decimal('oxygen_saturation', 4, 2); // Saturación de oxígeno (%)
            $table->enum('severity', ['alto', 'medio', 'bajo']); // Gravedad (Alto, Medio, Bajo)
            $table->timestamps();
    
            // Definimos la clave foránea para relacionar con la tabla 'user'
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencies');
    }
};
