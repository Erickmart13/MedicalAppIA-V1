<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Person::factory()->count(10)->create()->each(function ($person) {
            $rolePatient = Role::where('name', 'patient')->first();
            $person->user->roles()->attach($rolePatient);
        });
    }
}
