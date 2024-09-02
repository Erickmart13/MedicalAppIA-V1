<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
// Variable estática para almacenar el ID del usuario
        public static $userId;
        public function run(): void
        {
        // Crear un usuario
        $user = User::create(
            [
                'user_name' => 'paciente.prueba1',
                'email' => 'paciente1@gamil.com',
                'password' => Hash::make('password123'), // ID del usuario que creó el registro
               
                
            ]);

        $rolePatient = Role::where('name', 'patient')->first();
        $user->roles()->attach($rolePatient);

        // Almacenar el ID del usuario en la variable estática
        self::$userId = $user->id;
        
    }
}
