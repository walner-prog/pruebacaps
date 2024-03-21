<?php

// database/factories/FacturaFactory.php
namespace Database\Factories;

use App\Models\Factura;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
            'ClienteID' => Usuario::factory()->create()->UsuarioID,
            'EmisorID' => Usuario::factory()->create()->UsuarioID,
            'FechaDeEmision' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'Monto' => $this->faker->randomFloat(2, 50, 1000),
            'EstadoDePago' => $this->faker->randomElement(['pendiente', 'pagado']),
        ];
    }
}
