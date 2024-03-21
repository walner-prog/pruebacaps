<?php


// app/Http/Controllers/RegistroAguaController.php

namespace App\Http\Controllers;

use App\Models\Medidor;
use App\Models\RegistroAgua;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
class RegistroAguaController extends Controller
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
    public $Año; // Asegúrate de que esta propiedad esté definida
    public $user_id; // Corregir el nombre de la propiedad a $user_id
    public  $NumeroMedidor;
    public   $Mes;

    
    public function index()
    {
        $registrosAgua = RegistroAgua::all();
        return view('registro-agua.index', compact('registrosAgua'));
    }
    

    
    public function reporte()
    {
        $registrosAgua = RegistroAgua::all();
        $pdf = Pdf::loadView('registro-agua.reporte',compact('registrosAgua'));
        return $pdf->stream('reporte.pdf');
       // return view('alertas.index', compact('alertasAutomaticas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registrosAgua = RegistroAgua::all();
        // En el controlador
          $users = User::all();
         $medidores = Medidor::all();
           

        return view('registro-agua.create', compact('registrosAgua','users','medidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',

            'NombreDeUsuario' => 'required|string|max:255',
            'Mes' => 'required|string|max:255',
          
            'LecturaActual' => 'nullable|numeric|min:0',
            'LecturaAnterior' => 'nullable|numeric|min:0',
            'ConsumoM3' => 'nullable|numeric|min:0',
            'ValoraMetroCubico' => 'required|numeric|min:0',
            'SaldoAnteriorMora' => 'required|numeric|min:0',
            'TotalPago' => 'required|numeric|min:0',
            'ValorRecibido' => 'required|numeric|min:0',
            'NumeroRecibo' => 'required|string|max:255',
            'SaldoActualMora' => 'required|numeric|min:0',
            'NumeroMedidor' => 'nullable|string|max:255',
            'medidor_id'       => 'required|numeric|min:0',
        ]);

              // Validar reglas personalizadas definidas en el modelo
    
         // Calcular el ConsumoM3
    $consumoM3 = $request->input('LecturaActual', 0) - $request->input('LecturaAnterior', 0);
    
    // Calcular el TotalPago
    $totalPago = ($consumoM3 * $request->input('ValoraMetroCubico', 0)) + $request->input('SaldoAnteriorMora', 0);

    // Calcular el SaldoActualMora
    $saldoActualMora = $totalPago - $request->input('ValorRecibido', 0);

    $data = $request->all();
    $data['ConsumoM3'] = $consumoM3;
    $data['TotalPago'] = $totalPago;
    $data['SaldoActualMora'] = $saldoActualMora;
    $data['Año'] = $request->input('Año');
    $registrosAgua = RegistroAgua::create($data);
     //  $registrosAgua =  RegistroAgua::create($request->all());
       $users = User::all();
       $medidores = Medidor::all();
      
        return redirect()->route('registro-agua.index', compact('registrosAgua','users','medidores'))->with('info', 'Registro de agua creado exitosamente.');
   
   
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroAgua  $registroAgua
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $registrosAgua = RegistroAgua::findOrFail($id);
        return view('registro-agua.show', compact('registrosAgua'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroAgua  $registroAgua
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $registrosAgua = RegistroAgua::findOrFail($id);
        $users = User::all();
        $medidores = Medidor::all();
        
        
        return view('registro-agua.edit', compact('registrosAgua','users','medidores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegistroAgua  $registroAgua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreDeUsuario' => 'required|string|max:255',
            'Mes' => 'required|string|max:255',
            'Año' => 'required|numeric|min:0',
            'LecturaActual' => 'nullable|numeric|min:0',
            'LecturaAnterior' => 'nullable|numeric|min:0',
            'ConsumoM3' => 'nullable|numeric|min:0',
            'ValoraMetroCubico' => 'required|numeric|min:0',
            'SaldoAnteriorMora' => 'required|numeric|min:0',
            'TotalPago' => 'required|numeric|min:0',
            'ValorRecibido' => 'required|numeric|min:0',
            'NumeroRecibo' => 'required|string|max:255',
            'SaldoActualMora' => 'required|numeric|min:0',
           // 'NumeroMedidor' => 'nullable|string|max:255',
        ]);

        // Validar que el medidor no esté asignado a otro usuario
    $medidorAsignado = RegistroAgua::where('NumeroMedidor', $this->NumeroMedidor)
    ->where('user_id', '<>', $this->user_id)
    ->exists();

if ($medidorAsignado) {
    $this->addError('NumeroMedidor', 'El medidor ya está asignado a otro usuario.');
    return;
}

  /**    */
         // Lógica para verificar si ya existe un registro para el usuario, mes y año especificados
         $existingRecord = RegistroAgua::where('user_id', $this->user_id)
         ->where('Mes', $this->Mes)
         ->where('Año', $this->Año)
         ->exists();
 
     if ($existingRecord) {
        
         session()->flash('error', 'Ya existe un registro para este usuario en el mismo mes y año.');
     return redirect()->route('registro-agua.index');
     }
        // En lugar de actualizar el modelo User, solo actualiza el modelo RegistroAgua
    $registrosAgua = RegistroAgua::findOrFail($id);
    $medidores = Medidor::all();
    
    $registrosAgua->update($request->all());
 

    return redirect()->route('registro-agua.index',$registrosAgua)->with('update', 'Registro de agua actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroAgua  $registroAgua
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $registrosAgua = RegistroAgua::findOrFail($id);
        $registrosAgua->delete();

        return redirect()->route('registro-agua.index')->with('delete', 'Registro de agua eliminado exitosamente.');
    }
}
