{{-- @extends('layouts.app') --}}

<section>
    <head>
        <!-- En el head de tu vista -->
         <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
     </head>
    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-info text-white">
            <div class="card-header">
                <h1>Listado de Ingresos y Gastos</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
             <!-- En tu vista Blade -->
<form action="{{ route('ingresos-gastos.index') }}" method="get">
    @csrf
    <label for="ordenar_por_mes">Ordenar por Mes:</label>
    <select name="ordenar_por_mes" id="ordenar_por_mes">
        <option value="asc">Ascendente</option>
        <option value="desc">Descendente</option>
    </select>
    
    <label for="ordenar_por_año">Ordenar por Año:</label>
    <select name="ordenar_por_año" id="ordenar_por_año">
        <option value="asc">Ascendente</option>
        <option value="desc">Descendente</option>
    </select>

    <button type="submit">Aplicar Orden</button>
</form>

<!-- Resto de tu vista... -->

            <div class="card-body ">
                <table class="table table-striped table-responsive table-bordered">
                    <thead>
                        <tr  class=" bg-gradient-dark bg-opacity-75">
                            <th>ID</th>
                            <th>Concepto</th>
                            <th>Nombre del Mes</th>
                            <th>Monto</th>
                           
                            <th>Mes</th>
                            <th>Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody>
            
                      
            
                            <!-- Mostrar la tabla de ingresos y gastos combinados -->
                           @foreach ($ingresosGastos as $ingresoGasto)
                       <tr>
                        <td>{{ $ingresoGasto->id }}</td>
                        <td>{{ $ingresoGasto->concepto }}</td>
                        <td>{{ $ingresoGasto->nombre_mes }}</td>
                        <td>{{ $ingresoGasto->monto }}$</td>
                        <td>{{ $ingresoGasto->mes }}</td>
                        <td>{{ $ingresoGasto->fecha_registro }}</td>
                      </tr>
                          @endforeach
                  </tbody>
                   
                </table>
               
                <ul class="pagination">
                    {{ $ingresosGastos->links("pagination::bootstrap-4") }}
                </ul>

              
                <h2>Totales por Mes</h2>
                <table  class="table table-striped table-responsive table-bordered">
                    <thead>
                        <tr class=" ">
                            <th>Mes</th>
                          
                            <th>Total Ingresos</th>
                            <th>Total Gastos</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultadosPorMes as $mes => $resultado)
                            <tr>
                                <td>{{ $mes }}</td>
                               
                                <td>{{ $resultado['totalIngresos'] }}$</td>
                                <td>{{ $resultado['totalGastos'] }}$</td>
                                <td>{{ $resultado['resultado'] }}$</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    @stop
    
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
    @stop
    
    @section('js')
        <script> console.log('Hi!'); </script>
    @stop
    </section>
 
@section('content')
    
    

   

    
        <h2>Listado de Ingresos y Gastos</h2>
    
        <!-- Tabla de Ingresos -->
        <h3>Ingresos</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Mes</th>
                    <th>Fecha de Registro</th>
                    <th>Total Ingresos</th>
                    <th>Total Gastos</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingresosGastos as $ingresoGasto)
            @if (!isset($ingresoGasto->tipo) || $ingresoGasto->tipo !== 'ingreso')
                <!-- Filas de la tabla para gastos -->
                <tr>
                    <td>{{ $ingresoGasto->id }}</td>
                    <td>{{ $ingresoGasto->concepto }}</td>
                    <td>{{ $ingresoGasto->monto }}</td>
                    <td>{{ $ingresoGasto->fecha }}</td>
                    <td>{{ $ingresoGasto->nombre_mes }}</td>
                    <td>{{ $ingresoGasto->fecha_registro }}</td>
                    <td>{{ $resultadosPorMes[$ingresoGasto->mes]['totalIngresos'] ?? 0 }}</td>
                    <td>{{ $resultadosPorMes[$ingresoGasto->mes]['totalGastos'] ?? 0 }}</td>
                    <td>{{ $resultadosPorMes[$ingresoGasto->mes]['resultado'] ?? 0 }}</td>
                </tr>
            @endif
        @endforeach

                
            </tbody>
        </table>
    
        <!-- Tabla de Gastos -->
        <h3>Gastos</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Concepto</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Mes</th>
                    <th>Fecha de Registro</th>
                    <th>Total Ingresos</th>
                    <th>Total Gastos</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($ingresosGastos as $ingresoGasto)
            @if (!isset($ingresoGasto->tipo) || $ingresoGasto->tipo !== 'gasto')
                <!-- Filas de la tabla para gastos -->
                <tr>
                    <td>{{ $ingresoGasto->id }}</td>
                    <td>{{ $ingresoGasto->concepto }}</td>
                    <td>{{ $ingresoGasto->monto }}</td>
                    <td>{{ $ingresoGasto->fecha }}</td>
                    <td>{{ $ingresoGasto->nombre_mes }}</td>
                    <td>{{ $ingresoGasto->fecha_registro }}</td>
                    <td>{{ $resultadosPorMes[$ingresoGasto->mes]['totalIngresos'] ?? 0 }}</td>
                    <td>{{ $resultadosPorMes[$ingresoGasto->mes]['totalGastos'] ?? 0 }}</td>
                    <td>{{ $resultadosPorMes[$ingresoGasto->mes]['resultado'] ?? 0 }}</td>
                </tr>
            @endif
        @endforeach

            </tbody>
        </table>
    
    
<!-- Contenedor para la gráfica de total de ingresos por mes -->
<div style="width: 50%; margin: auto;">
    <canvas id="graficaIngresos"></canvas>
</div>

<!-- Contenedor para la gráfica de total de gastos por mes -->
<div style="width: 50%; margin: auto;">
    <canvas id="graficaGastos"></canvas>
</div>

<!-- Contenedor para la gráfica de resultado por mes -->
<div style="width: 50%; margin: auto;">
    <canvas id="graficaResultado"></canvas>
</div>




    <!-- Al final del contenido de tu vista o en una sección específica -->
<script>
    // Datos para la gráfica de total de ingresos por mes
    var datosIngresos = {
        labels: {!! json_encode(array_keys($resultadosPorMes)) !!},
        datasets: [{
            label: 'Total de Ingresos',
            data: {!! json_encode(array_column($resultadosPorMes, 'totalIngresos')) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    // Datos para la gráfica de total de ingresos por mes
var datosIngresos = {
    labels: {!! json_encode(array_keys($resultadosPorMes)) !!},
    datasets: [{
        label: 'Total de Ingresos',
        data: {!! json_encode(array_column($resultadosPorMes, 'totalIngresos')) !!},
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true,
        // Agregar gradiente
        backgroundColor: [
            'rgba(75, 192, 192, 0.2)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(75, 192, 192, 1)'
        ]
    }]
};


    // Datos para la gráfica de total de gastos por mes
    var datosGastos = {
        labels: {!! json_encode(array_keys($resultadosPorMes)) !!},
        datasets: [{
            label: 'Total de Gastos',
            data: {!! json_encode(array_column($resultadosPorMes, 'totalGastos')) !!},
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    };

    // Datos para la gráfica de resultado por mes
    var datosResultado = {
        labels: {!! json_encode(array_keys($resultadosPorMes)) !!},
        datasets: [{
            label: 'Resultado',
            data: {!! json_encode(array_column($resultadosPorMes, 'resultado')) !!},
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    };

    // Configuración común para todas las gráficas
    var opciones = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Crear gráfica de total de ingresos por mes
    var ctxIngresos = document.getElementById('graficaIngresos').getContext('2d');
    var graficaIngresos = new Chart(ctxIngresos, {
        type: 'bar',
        data: datosIngresos,
        options: opciones
    });

    // Crear gráfica de total de gastos por mes
    var ctxGastos = document.getElementById('graficaGastos').getContext('2d');
    var graficaGastos = new Chart(ctxGastos, {
        type: 'bar',
        data: datosGastos,
        options: opciones
    });

    // Crear gráfica de resultado por mes
    var ctxResultado = document.getElementById('graficaResultado').getContext('2d');
    var graficaResultado = new Chart(ctxResultado, {
        type: 'bar',
        data: datosResultado,
        options: opciones
    });




    // Datos para la gráfica de resultado por mes
var datosResultado = {
    labels: {!! json_encode(array_keys($resultadosPorMes)) !!},
    datasets: [{
        label: 'Resultado',
        data: {!! json_encode(array_column($resultadosPorMes, 'resultado')) !!},
        backgroundColor: [
            'rgba(255, 206, 86, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            // ... (puedes agregar más colores)
        ],
        borderColor: [
            'rgba(255, 206, 86, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(75, 192, 192, 1)',
            // ... (puedes agregar más colores)
        ],
        borderWidth: 1
    }]
};

// Crear gráfica de resultado por mes (tipo de gráfica: pie)
var ctxResultado = document.getElementById('graficaResultado').getContext('2d');
var graficaResultado = new Chart(ctxResultado, {
    type: 'pie',
    data: datosResultado,
    options: opciones
});

</script>


<style>
    /* Estilos para el contenedor de la gráfica de total de ingresos por mes */
    #contenedorIngresos {
        max-width: 600px; /* Puedes ajustar el valor según tu preferencia */
        max-height: 400px; /* Puedes ajustar el valor según tu preferencia */
        margin: auto;
    }

    /* Estilos para el contenedor de la gráfica de total de gastos por mes */
    #contenedorGastos {
        max-width: 600px;
        max-height: 400px;
        margin: auto;
    }

    /* Estilos para el contenedor de la gráfica de resultado por mes */
    #contenedorResultado {
        max-width: 800px;
        max-height: 400px;
        margin: auto;
    }
</style>

@endsection
