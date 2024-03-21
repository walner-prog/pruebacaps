<?php

// app/Models/Mantenimiento.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $primaryKey = 'MantenimientoID';
    protected $fillable = ['Tipo_Mantenimiento', 'Fecha_Programacion', 'Descripcion', 'UsuarioID'];
    protected $table = 'mantenimiento';

    // En el modelo Mantenimiento
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ClienteID');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
