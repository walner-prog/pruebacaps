<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\Medidor;
use App\Models\RegistroAgua;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
       // return view('admin.index');

        $user = User::all();
        $usuarios = User::all();
        $registrosAgua = RegistroAgua::all();
         // Obtener la cantidad de usuarios por rol
         $usuariosPorRol = $usuarios->groupBy('role')->map->count();
 
         // Obtener el total de mora por mes
         $moraPorMes = RegistroAgua::groupBy('Mes')
             ->selectRaw('Mes, SUM(SaldoActualMora) as totalMora')
             ->pluck('totalMora', 'Mes');
         return view('admin.index',compact('usuarios', 'usuariosPorRol', 'moraPorMes','registrosAgua','user'));
    }
}
