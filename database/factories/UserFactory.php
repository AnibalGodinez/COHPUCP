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
            'apellido' => $this->faker->lastName(),
            'imagen' => $this->faker->imageUrl(), // Genera una URL de imagen aleatoria
            'telefono_casa' => $this->faker->phoneNumber(), // Genera un número de teléfono aleatorio
            'telefono_cel' => $this->faker->phoneNumber(), // Genera un número de teléfono aleatorio
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'rol' => $this->faker->randomElement(['administrador', 'usuario']), // Asigna aleatoriamente 'administrador' o 'usuario'
            'estado' => $this->faker->randomElement(['activo', 'inactivo']), // Asigna aleatoriamente 'activo' o 'inactivo'
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
