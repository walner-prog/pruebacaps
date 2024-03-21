<?php

// app/Models/QuejasTickets.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuejasTickets extends Model
{
    protected $primaryKey = 'TicketID';
    protected $fillable = ['UsuarioID', 'Fecha_Creacion', 'Descripcion', 'Estado'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
