<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;

class FacturaController extends Controller
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
        $facturas = Factura::all();
        $clientes = User::all();
        return view('facturas.index', compact('facturas', 'clientes'));
    }

    public function create()
    {
        $clientes = User::all();
        return view('facturas.create', compact('clientes'));
    }

    public function store(Request $request)
    {
       $factura = Factura::create($request->all());
        return redirect()->route('facturas.index' , $factura)->with('info', 'Factura creada exitosamente.');
        return response()->json(['success' => 'Factura  creada exitosamente.']); 
    }

    public function show($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = User::all();
        return view('facturas.show', compact('factura','clientes'));
    }

    public function edit($id)
    {
        $factura = Factura::findOrFail($id);
        $clientes = User::all();
        return view('facturas.edit', compact('factura', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $factura = Factura::findOrFail($id);
        $factura->update($request->all());
        return redirect()->route('facturas.index', $factura)->with('update', 'Factura actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $factura = Factura::findOrFail($id);
        $factura->delete();
        return redirect()->route('facturas.index')->with('delete', 'Factura eliminada exitosamente.');
    }
}
