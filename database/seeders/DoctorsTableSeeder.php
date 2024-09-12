<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Person;
use App\Models\Specialty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Obtener todas las especialidades
        $specialties = Specialty::all();

       // Crear 20 doctores
       Person::factory()->count(10)->create()->each(function ($person) use ($specialties) {
        // Asignar el rol de doctor al usuario asociado con la persona
        $roleDoctor = Role::where('name', 'doctor')->first();
        $person->user->roles()->attach($roleDoctor);

        // Asignar especialidades al doctor
        $person->user->specialties()->sync(
            $specialties->random(rand(1, 4))->pluck('id')->toArray() // Asigna de 1 a 3 especialidades al azar
        );
    });
    }
}
