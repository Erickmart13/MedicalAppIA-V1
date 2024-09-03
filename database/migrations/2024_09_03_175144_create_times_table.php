<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->timestamps();
        });
         //Generar todas las horas del día
         $startTime = new DateTime('00:00:00');
         $endTime = new DateTime('00:00:00');
         $times=[];
 
                    
         //Insertar todas las horas en la tabla hour
         for ($h = 0; $h < 24; $h++) {
             $time = sprintf('%02d:00:00', $h);
             DB::table('times')->insert(['time' => $time]);
         }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
