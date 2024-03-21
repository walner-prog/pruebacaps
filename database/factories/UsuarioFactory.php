<?php

// database/factories/UsuarioFactory.php
namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'Nombre' => $this->faker->name,
            'Direccion' => $this->faker->address,
            'Contacto' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'RolID' => \App\Models\Rol::factory()->create()->RolID,
            'FechaDeRegistro' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'InformacionDeInicioDeSesion' => $this->faker->sentence,
        ];
    }
}

