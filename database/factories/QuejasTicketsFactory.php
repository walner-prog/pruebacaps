<?php

// database/factories/QuejasTicketsFactory.php
namespace Database\Factories;

use App\Models\QuejasTickets;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuejasTicketsFactory extends Factory
{
    protected $model = QuejasTickets::class;

    public function definition()
    {
        return [
            'UsuarioID' => Usuario::factory()->create()->UsuarioID,
            'Fecha_Creacion' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'Descripcion' => $this->faker->sentence,
            'Estado' => $this->faker->randomElement(['abierto', 'cerrado', 'en progreso']),
            'Prioridad' => $this->faker->randomElement(['alta', 'media', 'baja']),
        ];
    }
}
