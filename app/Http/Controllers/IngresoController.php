<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;

class IngresoController extends Controller
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
        $ingresos = Ingreso::all();
        return view('ingresos.index', compact('ingresos'));
    }

    public function create()
    {
        return view('ingresos.create');
    }

    public function store(Request $request)
    {
        Ingreso::create($request->all());
        return redirect()->route('ingresos.index')->with('create', 'Ingreso creado correctamente.');
        return response()->json(['success' => 'Ingrso  creado exitosamente.']); 
    }

    public function show(Ingreso $ingreso)
    {
        return view('ingresos.show', compact('ingreso'));
    }

    public function edit(Ingreso $ingreso)
    {
        return view('ingresos.edit', compact('ingreso'));
    }

    public function update(Request $request, Ingreso $ingreso)
    {
        $ingreso->update($request->all());
        return redirect()->route('ingresos.index')->with('update', 'Ingreso actualizado correctamente.');
    }

    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('ingresos.index')->with('delete', 'Ingreso eliminado correctamente.');
    }
}
