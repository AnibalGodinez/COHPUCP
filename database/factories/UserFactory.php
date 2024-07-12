<?php

namespace Database\Factories;

use App\Models\Pais; // Asegúrate de importar el modelo Pais
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'name2' => $this->faker->optional()->name(), // Actualizar para ser opcional
            'apellido' => $this->faker->lastName(),
            'apellido2' => $this->faker->optional()->lastName(), // Actualizar para ser opcional
            'numero_identidad' => $this->faker->unique()->numerify('###########'),
            'numero_colegiacion' => $this->faker->optional()->unique()->numerify('####-##-####'),
            'rtn' => $this->faker->optional()->unique()->numerify('###########'),
            'sexo' => $this->faker->randomElement(['masculino', 'femenino']),
            'fecha_nacimiento' => $this->faker->date(),
            'telefono' => $this->faker->optional()->phoneNumber(),
            'telefono_celular' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$zrR4KHv2nDcQjSUp6yBq4OqKD1PDjo8fndTK4sGd1YUuKPwfMRqM6', // password
            'remember_token' => Str::random(10),
            'estado' => 'activo',
            'pais_id' => Pais::factory(), // Asignar un pais_id válido
        ];
    }

    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
