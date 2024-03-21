<?php

namespace App\Http\Controllers;

use App\Models\LecturaMedidor;
use App\Models\User;
use App\Models\Medidor;
use Illuminate\Http\Request;

class LecturaMedidorController extends Controller
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
        $usuarios = User::all();
        $lecturas = LecturaMedidor::all();
        $medidores = Medidor::all();
        return view('lecturas.index', compact('lecturas', 'medidores','usuarios'));
    }

    public function buscar(Request $request)
{
    $mes = $request->input('mes');
    $nombreUsuario = $request->input('usuario');

    $query = LecturaMedidor::query();

    if ($mes) {
        $query->where('Mes_Leido', 'like', "%$mes%");
    }

    if ($nombreUsuario) {
        $query->whereHas('usuario', function ($q) use ($nombreUsuario) {
            $q->where('name', 'like', "%$nombreUsuario%");
        });
    }
    $medidores = Medidor::all();
    $usuarios = User::all();
    $lecturas = $query->get();
    
    // Verificar si hay registros
    if ($lecturas->isEmpty()) {
        $mensaje = 'No hay registros encontrados.';
    } else {
        $mensaje = null;
    }

    return view('lecturas.index', compact('lecturas','usuarios','medidores'));
}


    public function excel(){
         
        $lecturas = LecturaMedidor::all();
        $medidores = Medidor::all();
        return view('lecturas.generarpdf', compact('lecturas', 'medidores'));
    }

    public function create()
    {
        $usuarios = User::all();
        $medidores = Medidor::all();
        $lecturas = LecturaMedidor::all();
    
       
        return view('lecturas.create', compact('usuarios', 'medidores', 'lecturas'));
    }
    
   
    
    public function store(Request $request)
    {
        $request->validate([
            'UsuarioID' => 'required',
            'Lectura_Actual' => 'required|numeric|min:0',
            'Lectura_Anterior' => 'required|numeric|min:0',
            'Periodo_Del' => 'required|string|max:255',
            'Periodo_Al' => 'required|string|max:255',
            'Mes_Leido' => 'required|string|max:255',
            'Numero_Recibo' => 'required|string|max:255',
            // ... (otras validaciones para campos adicionales)
        ]);
      
        // Obtén el último registro de lectura para el usuario actual
    $ultimoRegistro = LecturaMedidor::where('UsuarioID', $request->UsuarioID)
    ->orderBy('Fecha_Lectura', 'desc')
    ->first();

// Calcula la Lectura Anterior para el nuevo registro
$lecturaAnterior = $ultimoRegistro ? $ultimoRegistro->Lectura_Actual : 0;

// Crea un nuevo registro de lectura
$lectura = LecturaMedidor::create([
    'UsuarioID' => $request->UsuarioID,
    'Lectura_Actual' => $request->Lectura_Actual,
    'Lectura_Anterior' => $lecturaAnterior,
    'Periodo_Del' => $request->Periodo_Del,
    'Periodo_Al' => $request->Periodo_Al,
    'Mes_Leido' => $request->Mes_Leido,
    'Numero_Recibo' => $request->Numero_Recibo,
    // ... (otros campos)
]);
        $lectura = LecturaMedidor::create($request->all());
        return redirect()->route('lecturas.index', $lectura)->with('info', 'lectura creado exitosamente.');
        return response()->json(['success' => 'lectura  creado exitosamente.']); 

       // LecturaMedidor::create();
    
       // return redirect()->route('lecturas.index')->with('info', 'Lectura de medidor creada exitosamente.');
    }
    
    public function show($id)
    {
        $lectura = LecturaMedidor::findOrFail($id);
        return view('lecturas.show', compact('lectura'));
    }

    public function edit($id)
    {
        $lectura = LecturaMedidor::findOrFail($id);
        $usuarios = User::all();
        $medidores = Medidor::all();
        return view('lecturas.edit', compact('lectura', 'usuarios', 'medidores'));
    }

    public function update(Request $request, $id)

    {
        $request->validate([
            'Lectura_Actual' => 'required|numeric|min:0',
            'Lectura_Anterior' => 'required|numeric|min:0',
            'Consumo_Agua' => 'required|numeric|min:0',
            'Valor_Cordoba' => 'required|numeric|min:0',
            'Periodo_Del' => 'required|string|max:255',
            'Periodo_Al' => 'required|string|max:255',
            'Mes_Leido' => 'required|string|max:255',
            'Numero_Recibo' => 'required|string|max:255',
            // ... (otras validaciones para campos adicionales)
        ]);
        

        $lectura = LecturaMedidor::findOrFail($id);
        $data = $request->except(['_token', '_method']);
        
        $consumoAgua = $data['Lectura_Actual'] - $data['Lectura_Anterior'];
        $data['Consumo_Agua'] = $consumoAgua;
        $data['Valor_Cordoba'] = $consumoAgua * 10;

        $lectura->update($data);
        return redirect()->route('lecturas.index')->with('update', 'Lectura de medidor actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $lectura = LecturaMedidor::findOrFail($id);
        $lectura->delete();
        return redirect()->route('lecturas.index')->with('delete', 'Lectura de medidor eliminada exitosamente.');
    }

    
}
