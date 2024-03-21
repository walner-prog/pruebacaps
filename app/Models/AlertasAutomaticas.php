<?php

// app/Models/AlertasAutomaticas.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertasAutomaticas extends Model
{
    protected $primaryKey = 'AlertaID';
    protected $fillable = ['Tipo_Alerta', 'Descripcion', 'Fecha_Hora_Activacion', 'UsuarioID'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'UsuarioID');
    }
}
