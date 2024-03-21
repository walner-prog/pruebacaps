<?php

// database/factories/MantenimientoFactory.php
namespace Database\Factories;

use App\Models\Mantenimiento;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class MantenimientoFactory extends Factory
{
    protected $model = Mantenimiento::class;

    public function definition()
    {
        return [
            'Tipo_Mantenimiento' => $this->faker->word,
            'Fecha_Programacion' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'Descripcion' => $this->faker->sentence,
            'UsuarioID' => Usuario::factory()->create()->UsuarioID,
            'UbicacionOEspecifico' => $this->faker->word,
        ];
    }
}
