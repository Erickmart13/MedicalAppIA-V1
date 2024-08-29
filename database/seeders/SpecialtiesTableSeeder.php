<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            [
                'name' => 'Pediatría',
                'description' => 'Especialidad médica dedicada a la salud de los niños.',
                'created_by' => 1, // ID del usuario que creó el registro
                'updated_by' => 1, // ID del usuario que actualizó el registro
                'active' => true, // true para activo, false para inactivo
                
            ],
            [
                'name' => 'Medicina Interna',
                'description' => 'Especialidad médica centrada en el diagnóstico y tratamiento de enfermedades en adultos.',
                'created_by' => 1,
                'updated_by' => 1,
                'active' => true,
                
            ],
            [
                'name' => 'Ginecología',
                'description' => 'Especialidad médica que se ocupa de la salud del sistema reproductor femenino.',
                'created_by' => 1,
                'updated_by' => 1,
                'active' => true,
                
            ],
            [
                'name' => 'Endocrinología',
                'description' => 'Especialidad médica enfocada en el sistema endocrino y sus enfermedades.',
                'created_by' => 1,
                'updated_by' => 1,
                'active' => true,
                
            ],
        ];

        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}
