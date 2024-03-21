<?php

// app/Models/Finanzas.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finanzas extends Model
{
    use HasFactory;

    protected $table = 'finanzas';

    protected $fillable = [
        'registro_agua_id',
        'monto_pago',
        'fecha_pago',
        'saldo_actual_mora',
        // Agrega más campos según sea necesario
    ];

    public function registroAgua()
    {
        return $this->belongsTo(RegistroAgua::class, 'registro_agua_id');
    }
}

