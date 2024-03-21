<?php

// app/Models/LecturaMedidor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturaMedidor extends Model
{
    protected $primaryKey = 'LecturaID';
    protected $fillable = ['MedidorID', 'UsuarioID', 'name', 'codigo', 'Fecha_Lectura', 'Lectura_Actual', 'Lectura_Anterior', 'Consumo_Agua', 'Valor_Cordoba', 'Periodo_Del', 'Periodo_Al', 'Mes_Leido', 'Numero_Recibo', 'Cantidad_Agua_Leida'];
    protected $table = 'lecturas_medidores';
    public function medidor()
    {
        return $this->belongsTo(Medidor::class);
    }

   

    public function usuario()
    {
        return $this->belongsTo(User::class, 'UsuarioID');
    }
    
    // Relación uno a muchos con la tabla 'registro_agua'
    public function registrosAgua()
    {
        return $this->hasMany(RegistroAgua::class, 'lectura_medidor_id');
    }
}
