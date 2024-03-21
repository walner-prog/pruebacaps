<?php

// app/Models/Cliente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id'; // Asegúrate de que coincida con la clave primaria en tu tabla clientes

    // Otras propiedades y métodos si es necesario

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'ClienteID');
    }
}
