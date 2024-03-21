<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\Medidor;
use App\Models\RegistroAgua;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('admin.index');
                     // Otras partes del código...

    // Obtener la suma del consumo de agua por mes para cada año
    // Obtener la suma del consumo de agua por mes para cada año


// Resto del código...
        $user = User::all();
        $usuarios = User::all();
        $registrosAgua = RegistroAgua::all();
         // Obtener la cantidad de usuarios por rol
         $usuariosPorRol = $usuarios->groupBy('role')->map->count();
 
        // $totalPago = ($consumoM3 * $request->input('ValoraMetroCubico', 0)) + $request->input('SaldoAnteriorMora', 0);
         // Obtener el total de mora por mes
         $moraPorMes = RegistroAgua::groupBy('Mes')
             ->selectRaw('Mes, SUM(SaldoActualMora) as totalMora')
             ->pluck('totalMora', 'Mes');

         return view('admin.index',compact('usuarios', 'usuariosPorRol', 'moraPorMes','registrosAgua','user'));
    }
}
