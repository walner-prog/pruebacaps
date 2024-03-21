<?php

// database/factories/LecturaMedidorFactory.php
namespace Database\Factories;

use App\Models\LecturaMedidor;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturaMedidorFactory extends Factory
{
    protected $model = LecturaMedidor::class;

    public function definition()
    {
        return [
            'MedidorID' => $this->faker->randomNumber(4),
            'UsuarioID' => Usuario::factory()->create()->UsuarioID,
            'FechaDeLectura' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'CantidadDeAguaLeida' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
