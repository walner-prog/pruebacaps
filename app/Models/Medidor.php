<?php

// app/Models/Medidor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    protected $fillable = ['descripcion', 'tipo', 'ubicacion', 'ubicacion','Nombre'];

    public function lecturas()
    {
        return $this->hasMany(LecturaMedidor::class);
    }

    // Relación uno a muchos con la tabla 'registro_agua'
    public function registrosAgua()
    {
        return $this->hasMany(RegistroAgua::class, 'medidor_id');
    }
}

