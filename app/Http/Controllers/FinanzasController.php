<?php

// app/Http/Controllers/FinanzasController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Finanzas;
class FinanzasController extends Controller
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
        $finanzas = Finanzas::all();
        return view('finanzas.index', compact('finanzas'));
    }

    public function create()
    {
        return view('finanzas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto_pago' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'saldo_actual_mora' => 'required|numeric',
        ]);

        Finanzas::create($request->all());

        return redirect()->route('finanzas.index')->with('success', 'Finanza creada exitosamente.');
    }

    public function edit(Finanzas $finanza)
    {
        return view('finanzas.edit', compact('finanza'));
    }

    public function update(Request $request, Finanzas $finanza)
    {
        $request->validate([
            'monto_pago' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'saldo_actual_mora' => 'required|numeric',
        ]);

        $finanza->update($request->all());

        return redirect()->route('finanzas.index')->with('success', 'Finanza actualizada exitosamente.');
    }

    public function destroy(Finanzas $finanza)
    {
        $finanza->delete();

        return redirect()->route('finanzas.index')->with('success', 'Finanza eliminada exitosamente.');
    }
}
