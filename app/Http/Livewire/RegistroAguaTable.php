<?php

// app/Http/Livewire/RegistroAguaTable.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RegistroAgua;
use App\Models\User;
use App\Models\Medidor;
use App\Models\Cliente;
use App\Models\LecturaMedidor;
use Barryvdh\DomPDF\Facade\Pdf;
// importamos la clase  use Livewire\WithPagination; para usar 
 // la paginacion
 use Livewire\WithPagination;
 use Illuminate\Pagination\LengthAwarePaginator;

class RegistroAguaTable extends Component
{


    /* le decimos que queremos usar la paginacion  */
    use WithPagination;
      
    protected $paginationTheme = "bootstrap";
    public $searchTerm = '';
    public $MesBusqueda = '';  // Inicializa aquí
    public $AñoBusqueda = '';  // Inicializa aquí

    public function updatingsearch(){
        // con esta linea seseteamos la paginacion
        $this->resetPage();
           
     }
   

    public function render()
    {
       $user = User::all();
       $medidor = Medidor::all();

       $registrosAgua = $this->buscarRegistros();


        $registrosAgua = RegistroAgua::where('NombreDeUsuario', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('Mes', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('ConsumoM3', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('SaldoActualMora', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('Año', 'like', '%' . $this->searchTerm . '%')
            ->paginate(10);// Número de registros por página

            $registrosAguaestadistica = RegistroAgua::all();

             // Obtener el total de registros por año y mes
        $totalRegistrosPorAñoYMes = RegistroAgua::groupBy(['Año', 'Mes'])
        ->selectRaw('Año, Mes, COUNT(*) as totalRegistros')
        // ->orderby('Mes')
        ->paginate(12);

    // Obtener el promedio de consumo por año y mes
    $promedioConsumoPorAñoYMes = RegistroAgua::groupBy(['Año', 'Mes'])
        ->selectRaw('Año, Mes, AVG(ConsumoM3) as promedioConsumo')
       // ->orderby('Mes')
        ->paginate(12);
       
                // Obtener el total de consumo por año y mes
$totalConsumoPorAñoYMes = RegistroAgua::groupBy(['Año', 'Mes'])
->selectRaw('Año, Mes, SUM(ConsumoM3) as totalConsumo')
// ->orderby('Mes')
->paginate(12);
            // Obtener el total de mora por mes
        $moraPorMes = RegistroAgua::groupBy('Mes')
        ->selectRaw('Mes, SUM(SaldoActualMora) as totalMora')
        ->pluck('totalMora', 'Mes');
        // Número de registros por página


        return view('livewire.registro-agua-table', compact('registrosAgua', 'user', 'medidor', 'moraPorMes', 
        'totalRegistrosPorAñoYMes',
         'promedioConsumoPorAñoYMes', 'totalConsumoPorAñoYMes','registrosAguaestadistica'));
    }
     
    private function buscarRegistros()
    {
        return RegistroAgua::when($this->MesBusqueda, function ($query) {
                return $query->where('Mes', $this->MesBusqueda);
            })
            ->when($this->AñoBusqueda, function ($query) {
                return $query->where('Año', $this->AñoBusqueda);
            })
            ->where(function ($query) {
                $query->where('NombreDeUsuario', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('ConsumoM3', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('SaldoActualMora', 'like', '%' . $this->searchTerm . '%');
            })
            ->paginate(10);
    }
    
 // Nuevo método para obtener el promedio de consumo por año
public function obtenerPromedioConsumoPorAño()
{
    return RegistroAgua::groupBy(['Año', 'Mes'])
        ->selectRaw('Año, Mes, AVG(ConsumoM3) as promedioConsumo')
        ->get();
}
}
