<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingreso;
class Gasto extends Model
{
    use HasFactory;

    protected $fillable = ['concepto', 'monto', 'fecha', 'mes','nombre_mes','tipo'];

    public function ingreso()
{
    return $this->belongsTo(Ingreso::class);
}

}

