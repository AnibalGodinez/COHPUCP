<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'name2' => $this->faker->name2(),
            'apellido' => $this->faker->apellido(),
            'apellido2' => $this->faker->apellido2(),
            'numero_identidad' => $this->faker->numero_identidad(),
            'numero_colegiacion' => $this->faker->numero_colegiacion(),
            'rtn' => $this->faker->rtn(),
            'sexo' => $this->faker->sexo(),
            'fecha_nacimiento' => $this->faker->fecha_nacimiento(),
            'telefono' => $this->faker->telefono(),
            'telefono_celular' => $this->faker->telefono(),
            
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$zrR4KHv2nDcQjSUp6yBq4OqKD1PDjo8fndTK4sGd1YUuKPwfMRqM6', // password
            'remember_token' => Str::random(10),
        ];
        
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
