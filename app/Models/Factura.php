<?php

// app/Models/Factura.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $primaryKey = 'FacturaID';
    protected $fillable = ['ClienteID', 'Fecha_Emision', 'Monto', 'Estado_Pago'];
    public function getRouteKeyName()
    {
        return 'FacturaID'; // Ajusta según la clave primaria de tu modelo Factura
    }
    

    public function cliente()
    {
        return $this->belongsTo(User::class);
    }

    public function clienteuser()
    {
        return $this->belongsTo(Cliente::class);
    }
}
