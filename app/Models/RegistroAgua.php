<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// app/Models/RegistroAgua.php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
class RegistroAgua extends Model
{


    protected $fillable = [
        'user_id',
        'NombreDeUsuario',  'Mes',  'Año',   'LecturaActual',     'LecturaAnterior',  'ConsumoM3','ValoraMetroCubico',
        'SaldoAnteriorMora', 'TotalPago',
        'ValorRecibido',
        'NumeroRecibo',
        'SaldoActualMora',
        'medidor_id',
        'lectura_medidor_id',
        'NumeroMedidor',
    ];

    public static function rules($id = null)
    {
        return [
            // Otras reglas...
            'Año' => [
                'required',
                'numeric',
                Rule::unique('registros_agua')->where(function ($query) {
                    return $query->where('user_id', request('user_id'))
                        ->where('Mes', request('Mes'));
                })->ignore($id),
            ],
        ];
    }
    // Relación muchos a uno con la tabla 'users'
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    // En tu modelo RegistroAgua
public function medidor()
{
    return $this->belongsTo(Medidor::class, 'id', 'codigo');
}


    // Relación muchos a uno con la tabla 'lecturas_medidores'
    public function lecturaMedidor()
    {
        return $this->belongsTo(LecturaMedidor::class, 'LecturaID');
    }
}
