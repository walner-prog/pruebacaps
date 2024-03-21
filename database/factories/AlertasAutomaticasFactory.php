<?php

// database/factories/AlertasAutomaticasFactory.php
namespace Database\Factories;

use App\Models\AlertasAutomaticas;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlertasAutomaticasFactory extends Factory
{
    protected $model = AlertasAutomaticas::class;

    public function definition()
    {
        return [
            'Tipo_Alerta' => $this->faker->word,
            'Descripcion' => $this->faker->sentence,
            'Fecha_Hora_Activacion' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'UsuarioID' => Usuario::factory()->create()->UsuarioID,
        ];
    }
}
