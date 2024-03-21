<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gasto;
class Ingreso extends Model
{
    use HasFactory;

    protected $fillable = ['concepto', 'monto', 'fecha', 'mes','nombre_mes','tipo'];

    public function gastos()
{
    return $this->hasMany(Gasto::class);
}
}


