<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario
        $adminUser = User::create([
            'user_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Asegúrate de usar un password seguro
        ]);

        // Obtener el rol de administrador
        $adminRole = Role::where('name', 'admin')->first();

        // Asignar el rol de administrador al usuario
        $adminUser->roles()->attach($adminRole);

        // Crear el registro en la tabla Person
        Person::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => $adminUser->email,
            'cedula' => '1234567890', // Cambia esto según sea necesario
            'address' => 'Admin Address',
            'phone' => '0987654321', // Cambia esto según sea necesario
            'date_of_birth' => '1980-01-01', // Cambia esto según sea necesario
            'age' => 44,
            'gender' => 'male', // Cambia esto según sea necesario
            'city_id' => 1, // Cambia esto según tu lógica de ciudades
            'user_id' => $adminUser->id, // Relación con el usuario recién creado
        ]);
    }
}
