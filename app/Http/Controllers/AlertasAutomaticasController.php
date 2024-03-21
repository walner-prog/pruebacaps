<?php

namespace App\Http\Controllers;

use App\Models\AlertasAutomaticas;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlertasAutomaticasController extends Controller
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
        $alertasAutomaticas = AlertasAutomaticas::all();
        return view('alertas.index', compact('alertasAutomaticas'));
    }

    public function reporte()
    {
        $alertasAutomaticas = AlertasAutomaticas::all();
        $pdf = Pdf::loadView('alertas.reporte',compact('alertasAutomaticas'));
        return $pdf->stream('reporte.pdf');
       // return view('alertas.index', compact('alertasAutomaticas'));
    }

    public function create()
    {    

        $alertasAutomaticas = AlertasAutomaticas::all();
        $usuarios = User::all();
        return view('alertas.create', compact('usuarios','alertasAutomaticas'));
    }

    public function store(Request $request)
    {
        $alertasAutomaticas = AlertasAutomaticas::create($request->all());
        return redirect()->route('alertas.index',compact('alertasAutomaticas'))->with('info', 'Alerta automática creada exitosamente.');
    }

    public function show($id)
    {
        $alertasAutomaticas = AlertasAutomaticas::findOrFail($id);
        return view('alertas.show', compact('alertasAutomaticas'));
    }

    public function edit($id)
    {
        $alertasAutomaticas = AlertasAutomaticas::findOrFail($id);
        $usuarios = User::all();
        return view('alertas.edit', compact('alertasAutomaticas', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $alertasAutomaticas = AlertasAutomaticas::findOrFail($id);
        $alertasAutomaticas->update($request->all());
        return redirect()->route('alertas.index',$alertasAutomaticas)->with('update', 'Alerta automática actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $alertasAutomaticas = AlertasAutomaticas::findOrFail($id);
        $alertasAutomaticas->delete();
        return redirect()->route('alertas.index')->with('delete', 'Alerta automática eliminada exitosamente.');
    }
}
