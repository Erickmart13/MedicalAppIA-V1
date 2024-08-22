<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'doctor'],
            ['name' => 'tecnico1'],
            ['name' => 'tecnico2'],
            ['name' => 'patient'],
            ['name' => 'auditor'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
