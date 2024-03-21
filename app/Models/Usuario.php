<?php

// app/Models/Usuario.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'UsuarioID';
    protected $fillable = ['Nombre', 'Direccion', 'email', 'password', 'Contacto', 'RolID'];

   public function rol(){

    return $this->belongsTo(Rol::class, 'RolID');
   }

    public function lecturas()
    {
        return $this->hasMany(LecturaMedidor::class, 'UsuarioID');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'ClienteID');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'UsuarioID');
    }

    public function quejasTickets()
    {
        return $this->hasMany(QuejasTickets::class, 'UsuarioID');
    }

    public function alertasAutomaticas()
    {
        return $this->hasMany(AlertasAutomaticas::class, 'UsuarioID');
    }

    
}