<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


     protected $model = Person::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'cedula' => $this->faker->numerify('##########'), // 10 dígitos
            'address' => $this->faker->address,
            'phone' => $this->faker->numerify('##########'), // 10 dígitos
            'date_of_birth' => $this->faker->date,
            'age' => $this->faker->numberBetween(18, 80),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'city_id' => 1,
            'user_id' => function () {
                $user = User::factory()->create([
                    'password' => Hash::make('password123') // Contraseña predeterminada
                ]);
                return $user->id;
            },
        ];
    }
}
