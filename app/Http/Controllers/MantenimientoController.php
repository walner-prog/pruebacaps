<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Mantenimiento;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
        $this->middleware('permission:ver-mantenimiento|crear-mantenimiento|borrar-mantenimiento', ['only'=>['index']]);

        $this->middleware('permission:crear-mantenimiento', ['only'=>['create','store']]);

        $this->middleware('permission:editar-mantenimiento', ['only'=>['edit','update']]);

        $this->middleware('permission:borrar-mantenimiento', ['only'=>['destroy']]);
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mantenimientos = Mantenimiento::all();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
       $usuarios = User::all();
        return view('mantenimientos.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
       $mantenimiento = Mantenimiento::create($request->all());
        return redirect()->route('mantenimientos.index', $mantenimiento)->with('info', 'Mantenimiento creado exitosamente.');
        return response()->json(['success' => 'Manternimiento  creado exitosamente.']); 
    }

    public function show($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        return view('mantenimientos.show', compact('mantenimiento'));
    }

    public function edit($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $usuarios = User::all();
        return view('mantenimientos.edit', compact('mantenimiento', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->update($request->all());
        return redirect()->route('mantenimientos.index', $mantenimiento)->with('update', 'Mantenimiento actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->delete();
        return redirect()->route('mantenimientos.index')->with('delete', 'Mantenimiento eliminado exitosamente.');
    }
}

