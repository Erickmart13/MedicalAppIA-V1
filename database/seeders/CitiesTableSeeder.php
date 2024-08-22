<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Quito'],
            ['name' => 'Guayaquil'],
            ['name' => 'Cuenca'],
            ['name' => 'Santo Domingo'],
            ['name' => 'Machala'],
            ['name' => 'Manta'],
            ['name' => 'Portoviejo'],
            ['name' => 'Ambato'],
            ['name' => 'Riobamba'],
            ['name' => 'Esmeraldas'],
            ['name' => 'Quevedo'],
            ['name' => 'Loja'],
            ['name' => 'Ibarra'],
            ['name' => 'Babahoyo'],
            ['name' => 'La Libertad'],
            ['name' => 'Latacunga'],
            ['name' => 'Milagro'],
            ['name' => 'Durán'],
            ['name' => 'Tena'],
            ['name' => 'Tulcán'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
