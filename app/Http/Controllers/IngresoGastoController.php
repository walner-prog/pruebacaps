<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingreso;
use App\Models\Gasto;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class IngresoGastoController extends Controller
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
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function index(Request $request)
    {
        $query = DB::table('ingresos')
            ->select('id', 'concepto', 'monto', 'fecha', 'mes', 'nombre_mes', 'created_at as fecha_registro')
            ->union(
                DB::table('gastos')
                    ->select('id', 'concepto', 'monto', 'fecha', 'mes', 'nombre_mes', 'created_at as fecha_registro')
            );

        // Aplicar ordenamiento según la solicitud del usuario
        $query->when($request->has('ordenar_por_mes'), function ($query) {
            return $query->orderBy('nombre_mes', request('ordenar_por_mes'));
        });

        $query->when($request->has('ordenar_por_año'), function ($query) {
            return $query->orderBy('fecha', request('ordenar_por_año'));
        });

        // Obtener los resultados paginados
        $ingresosGastos = $query->orderBy('fecha', 'asc')->paginate(6);

        // Calcular $resultadosPorMes aquí (puedes reutilizar el código existente)
        $totalIngresosPorMes = DB::table('ingresos')
            ->selectRaw('SUM(monto) as total, mes')
            ->groupBy('mes')
            ->get();

        $totalGastosPorMes = DB::table('gastos')
            ->selectRaw('SUM(monto) as total, mes')
            ->groupBy('mes')
            ->get();

        $resultadosPorMes = [];
        foreach ($totalIngresosPorMes as $ingreso) {
            $mes = $ingreso->mes;
            $totalIngresos = $ingreso->total;
            $totalGastos = 0;

            $gastoCorrespondiente = $totalGastosPorMes->where('mes', $mes)->first();
            if ($gastoCorrespondiente) {
                $totalGastos = $gastoCorrespondiente->total;
            }

            $resultado = $totalIngresos - $totalGastos;

            $resultadosPorMes[$mes] = [
                'totalIngresos' => $totalIngresos,
                'totalGastos' => $totalGastos,
                'resultado' => $resultado,
            ];
        }

        return view('ingresos_gastos.index', compact('ingresosGastos', 'resultadosPorMes'));
    }
}
