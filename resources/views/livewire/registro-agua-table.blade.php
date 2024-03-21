<div>
     <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
        <head>
    <!-- Otros elementos del encabezado... -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

     </head>
<div>
    @if (session('error'))
    <div class="alert alert-danger">
       <strong>{{ session('error') }}</strong>
   </div>
    @endif


  @if (session('create'))
    <div class="alert alert-success">
       <strong>{{ session('create') }}</strong>
   </div>
    @endif

    
    @if (session('update'))
    <div class="alert alert-warning">
        <i class="fa-fw fa-check"></i>
       <strong>{{ session('update') }}</strong>
   </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger">
       <strong>{{ session('delete') }}</strong>
   </div>
    @endif
   
    
    <div class="card bg-gradient-dark">
        
        
     <div class="card-body">
       <!-- resources/views/livewire/registro-agua-table.blade.php -->

<!-- ... -->
<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <label class="input-group-text bg-gradient-gray" for="AñoBusqueda">Año</label>
            <select class="form-select bg-gradient-indigo" wire:model="AñoBusqueda" id="AñoBusqueda">
                <option value="">Selecciona un año</option>
                @for ($year = 2024; $year <= 2029; $year++)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
        
    </div>
    <div class="col-6">
        <div class="input-group mb-3 " >
            <label class="input-group-text bg-gradient-dark" for="MesBusqueda">Mes</label>
            <select class="form-select bg-gradient-danger" wire:model="MesBusqueda" id="MesBusqueda">
                <option value="">Selecciona un mes</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <!-- ... opciones para otros meses ... -->
                <!-- ... resto de los meses ... -->
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
        </div>
    </div>
</div>




<!-- resources/views/livewire/registro-agua-table.blade.php -->

<!-- ... -->


     
        <input type="text" class=" form-control form-control-sm bg-gradient-dark text-white-50 " style="max-width: 400px" wire:model="searchTerm" placeholder="Buscar por nombre, mes, consumo, saldo..." >
        
        <div class="card-header float-right">
            <a href="{{ route('registro-agua.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i>     Crear Nuevo Registro</a>
      
        </div>
        <a class="btn btn-danger btn-sm " href="{{ route('registro-agua.reporte') }} " target=" blank"><i class=" fas fa-file-pdf mr-2"></i>PDF</a>
      </div>
      
    </div>

   
    
  <table class="table table-striped table-bordered table-responsive  ">
      <!-- Encabezado de la tabla -->
      <!-- ... -->
      <thead class="position-sticky" >
          <tr  class=" bg-gradient-dark bg-opacity-75 position-sticky  ">
           <th>ID</th>
           <th>Nombre de Usuario</th>
           <th>Mes</th>
           <th>Año</th>
           <th>Lectura Actual</th>
           <th>Lectura Anterior</th>
           <th>Consumo (M3)</th>
           <th>Valor por Metro Cúbico</th>
           <th>Saldo Anterior por Mora</th>
           <th>Total de Pago</th>
           <th>Valor Recibido</th>
            <th>Número de Recibo</th>    
           <th>Saldo Actual por Mora</th>
           <th>Número de Medidor</th>
           <th colspan="3">Acciones</th>
           </tr>
         </thead>
      <!-- Cuerpo de la tabla -->
      <tbody>

        @if($registrosAgua->count() > 0)
          @foreach($registrosAgua as $registroAgua)
              <tr>
                 
                  <td>{{ $registroAgua->user_id }}</td>
                  <td>{{ $registroAgua->NombreDeUsuario }}</td>
                  <td>{{ $registroAgua->Mes }}</td>
                  <td>{{ $registroAgua->Año }}</td>
                  <td>{{ $registroAgua->LecturaActual }}</td>
                  <td>{{ $registroAgua->LecturaAnterior }}</td>
                  <td>{{ $registroAgua->ConsumoM3 }}</td>
                  <td>${{ $registroAgua->ValoraMetroCubico }}</td>
                  <td>${{ $registroAgua->SaldoAnteriorMora }}</td>
                  <td>${{ $registroAgua->TotalPago }}</td>
                  <td>${{ $registroAgua->ValorRecibido }}</td>
                  <td>{{ $registroAgua->NumeroRecibo }}</td>
                  <td>{{ $registroAgua->SaldoActualMora }}</td>
                  <td>{{ $registroAgua->NumeroMedidor }}</td>

                

                  <td> <a href="{{ route('registro-agua.show', $registroAgua->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                  <td><a href="{{ route('registro-agua.edit', $registroAgua->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>
                  <td>
                    <form action="{{ route('registro-agua.destroy', $registroAgua->id) }}" method="POST" style="display:inline;">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')"><i class="fas fa-trash"></i></button>
                 </form>
             </td>
              </tr>
             
          @endforeach
          @else
            <tr>
                <td colspan="16" class="text-center">No se encontraron registros que coincidan con la búsqueda.</td>
            </tr>
            @endif
      </tbody>
      
    </div>
  </table>
                    <!-- Enlaces de paginación -->
                 <div class="d-flex justify-content-center">
                     {!! $registrosAgua->links() !!}
                 </div>

  
                 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroAguaModal">
  Crear Nuevo Registro
</button>



<div class="card w-auto">
    <div class="card-body">
        <h3>Estadísticas Generales</h3>
        <ul>
            <li>Total de Registros de Agua: {{ count($registrosAguaestadistica) }}</li>
            <li>Promedio de Consumo de Agua: {{ number_format($registrosAguaestadistica->avg('ConsumoM3'), 2) }} M3</li>
            <li>Mes con Mayor Consumo: {{ $registrosAguaestadistica->max('Mes') }} ({{ $registrosAguaestadistica->max('ConsumoM3') }} M3)</li>
            <li>Mes con Menor Consumo: {{ $registrosAguaestadistica->min('Mes') }} ({{ $registrosAguaestadistica->min('ConsumoM3') }} M3)</li>
        </ul>
    </div>
</div>



<div class="card-body">
    
    <div class="card-header">
        <h3>Total de Registros de Agua por Año y Mes</h3>
    </div>
     <table class="table table-bordered table-striped  ">
        <thead>
            <tr class=" bg-gradient-dark bg-opacity-75 position-sticky  ">
                <th>Año</th>
                <th>Mes</th>
                <th>registros</th>
            </tr>
        </thead>
        <tbody>
            @foreach($totalRegistrosPorAñoYMes as $totalRegistro)
                <tr>
                    <td class=" bg-gradient-pink">{{ $totalRegistro->Año }}</td>
                    <td  class=" bg-gradient-purple text-white">{{ $totalRegistro->Mes }}</td>
                    <td class=" bg-gradient-olive">{{ $totalRegistro->totalRegistros }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
               
                    <!-- Enlaces de paginación -->
                    <div class="d-flex justify-content-center ">
                        <p class=" bg-success text-bg-success">  {!! $totalRegistrosPorAñoYMes->links() !!}</p> 
                    </div>
   
  </div>     



<div class="card-body">

    <h3>Promedio de Consumo de Agua por Año y Mes</h3>
     <table class="table table-bordered table-striped ">
        <thead>
            <tr class=" bg-gradient-dark bg-opacity-75 position-sticky  ">
                <th>Año</th>
                <th>Mes</th>
                <th>Promedio de Consumo (M3)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promedioConsumoPorAñoYMes as $promedioConsumo)
                <tr>
                    <td class=" bg-gradient-gray">{{ $promedioConsumo->Año }}</td>
                    <td  class=" bg-gradient-info text-white">{{ $promedioConsumo->Mes }}</td>
                    <td class=" bg-gradient-olive">{{ number_format($promedioConsumo->promedioConsumo, 2) }}M3</td>
                </tr>
            @endforeach
        </tbody>
    </table>
               
                    <!-- Enlaces de paginación -->
                    <div class="d-flex justify-content-center ">
                        <p class=" bg-success text-bg-success">  {!! $promedioConsumoPorAñoYMes->links() !!}</p> 
                    </div>
   
  </div>

  
    
 {{-- Se mostraran los totales 

    <div class="card w-auto">
    <div class="card-body">
        <h3>Estadísticas por Mes</h3>

        
                       <p class="card-text">
                        <strong>Totales de Consumo por Mes:</strong>
                        <ul>
                            @foreach($totalConsumoPorAñoYMes as $total)
                                <li>{{ $total->Año }} - Mes {{ $total->Mes }}: {{ $total->totalConsumo }} M3</li>
                            @endforeach
                        </ul>
                    </p>
                
    </div>
</div> --}}


<!-- ... Resto del contenido ... -->
  <div class="card-body">
    <h3>Totales de Consumo por Mes</h3>
    <table class="table table-bordered table-striped ">
        <thead>
            <tr class=" bg-gradient-dark bg-opacity-75 position-sticky  ">
                <th>Año</th>
                <th>Mes</th>
                <th>Total Consumo (M3)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($totalConsumoPorAñoYMes as $total)
                <tr>
                    <td class=" bg-gradient-warning">{{ $total->Año }}</td>
                    <td  class=" bg-gradient-lime text-white">{{ $total->Mes }}</td>
                    <td class=" bg-gradient-success">{{$total->totalConsumo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
               
                    <!-- Enlaces de paginación -->
                    <div class="d-flex justify-content-center ">
                        <p class=" bg-success text-bg-success">  {!! $totalConsumoPorAñoYMes->links() !!}</p> 
                    </div>
   
  </div>

  <h3>Total de Registros de Agua por Año y Mes</h3>
  <ul>
      @foreach($totalRegistrosPorAñoYMes as $totalRegistro)
          <li>Año {{ $totalRegistro->Año }}, Mes {{ $totalRegistro->Mes }}: {{ $totalRegistro->totalRegistros }} registros</li>
      @endforeach
  </ul>
      
  
    <h3>Promedio de Consumo de Agua por Año y Mes</h3>
  <ul>
      @foreach($promedioConsumoPorAñoYMes as $promedioConsumo)
          <li>Año {{ $promedioConsumo->Año }}, Mes {{ $promedioConsumo->Mes }}: {{ number_format($promedioConsumo->promedioConsumo, 2) }} M3</li>
      @endforeach
  </ul>
  
    <h4>Sección de Alertas</h4>
  <div class="card w-auto">
      <div class="card-body bg-gradient-red">
          <h3>Alertas de Consumo</h3>
          <ul>
              @foreach($registrosAgua as $registroAgua)
                  @if($registroAgua->ConsumoM3 > 30)
                      <li><strong>Alerta:</strong> Consumo elevado en {{ $registroAgua->Mes }} ({{ $registroAgua->ConsumoM3 }} M3)</li>
                  @endif
              @endforeach
          </ul>
      </div>
  </div>    


<div class="card w-auto">
  <div class="card-body">
      <h3>Total de Pagos por Mes</h3>
      <div style="position: relative; height: 300px; width: auto;">
          <canvas id="pagosChart" style="height: 100%; width: 100%;"></canvas>
      </div>
  </div>
</div>



<script>

  document.addEventListener('DOMContentLoaded', function () {
      // Obtener los datos necesarios para el gráfico desde el backend
      const meses = @json($registrosAgua->pluck('Mes'));
      const totalPagos = @json($registrosAgua->pluck('TotalPago'));

      // Configurar y crear el gráfico
      const ctx = document.getElementById('pagosChart').getContext('2d');
      const pagosChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: meses,
              datasets: [{
                  label: 'Total de Pagos',
                  data: totalPagos,
                  backgroundColor: 'success', // Color de fondo
                  borderColor: 'rgba(54, 162, 235, 1)',     // Color del borde
                  borderWidth: 1,
              }],
          },
          options: {
              scales: {
                  y: {
                      beginAtZero: true,
                  },
              },
              maintainAspectRatio: false,
              responsive: true,
          },
      });
  });
</script>
<div class="card w-auto">
  <div class="card-body">
      <h3>Evolución Mensual</h3>
      <canvas id="evolucionMensualChart" style="max-height: 400px;"></canvas>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Datos de ejemplo
      var datosEvolucionMensual = {
          labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
          datasets: [
              {
                  label: 'Temperatura (°C)',
                  data: [15, 18, 20, 22, 25, 28, 30],
                  fill: false,
                  borderColor: 'rgba(255, 99, 132, 1)', // Rojo
                  tension: 0.1
              },
              {
                  label: 'Precipitación (mm)',
                  data: [50, 40, 30, 20, 10, 5, 15],
                  fill: false,
                  borderColor: 'rgba(75, 192, 192, 1)', // Verde azulado
                  tension: 0.1
              }
          ]
      };

      // Configuración del gráfico
      var opcionesEvolucionMensual = {
          maintainAspectRatio: false,
          responsive: true,
          scales: {
              y: {
                  beginAtZero: true
              }
          },
          plugins: {
              legend: {
                  position: 'top', // Posición de la leyenda (top, bottom, left, right)
              },
              title: {
                  display: true,
                  text: 'Evolución Mensual'
              }
          }
      };

      // Crear el gráfico
      var ctx = document.getElementById('evolucionMensualChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line', // Tipo de gráfico (línea en este caso)
          data: datosEvolucionMensual,
          options: opcionesEvolucionMensual
      });
  });
</script>


<div class="card w-auto">
  <div class="card-body bg-gradient-secondary">
      <h3>Estadísticas por Mes</h3>

      @foreach($user as $usuario)
          <div class="card mb-3">
              <div class="card-body bg-gradient-gray">
                  <h5 class="card-title text-white-50">Usuario: <br>{{ $usuario->name }}</h5>
                  
                  @foreach($registrosAguaestadistica->where('user_id', $usuario->id)->groupBy('Mes') as $mes => $registrosPorMes)
                      <p class="card-text">
                         
                          <ul>
                           
                               <strong class=" text-gray-dark fz-6">Mes {{ $mes }}:</strong>
                              <li>Total de Lecturas: {{ $registrosPorMes->count() }}</li>
                              <li>Total de Metros Consumidos: {{ $registrosPorMes->sum('ConsumoM3') }} M3</li>
                          </ul>
                      </p>
                  @endforeach
              </div>

              
                    
   
          </div>
      @endforeach
     
  </div>

     
</div>


<style>
  .chart-container {
      position: relative;
      width: 100%;
      max-width: 600px; /* Ajusta este valor según tus necesidades */
      margin: auto;
      max-height: 400px;
  }
</style>



     


<div class="card w-auto">
  <div class="card-body">
      <h3>Total de Mora por Mes</h3>
      <div style="position: relative; height: 300px; width: auto;">
          <canvas id="moraPorMesChart" style="height: 100%; width: 100%;"></canvas>
      </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Obtener los datos necesarios para el gráfico desde el backend
      const meses = @json($moraPorMes->keys());
      const totalMoraPorMes = @json($moraPorMes->values());

      // Configurar y crear el gráfico de torta
      const ctx = document.getElementById('moraPorMesChart').getContext('2d');
      const moraPorMesChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: meses,
              datasets: [{
                  data: totalMoraPorMes,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.7)',
                      'rgba(54, 162, 235, 0.7)',
                      'rgba(255, 206, 86, 0.7)',
                      'rgba(75, 192, 192, 0.7)',
                      'rgba(153, 102, 255, 0.7)',
                      'rgba(255, 159, 64, 0.7)',
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                  ],
                  borderWidth: 1,
              }],
          },
          options: {
              maintainAspectRatio: false,
              responsive: true,
          },
      });
  });
</script>



<!-- Modal 
    Puedes controlar el tamaño del modal utilizando la clase modal-dialog con una de las siguientes clases:

      modal-lg: Modal grande.
       modal-sm: Modal pequeño.-->

<div class="modal fade" id="registroAguaModal" tabindex="-1" role="dialog" aria-labelledby="registroAguaModalLabel" aria-hidden="true">
  <div class="modal-dialog animated animation-duration-3s" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="registroAguaModalLabel">Crear Nuevo Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="card">
            <div class="card-body">
                   
              <div class="modal-body">
                <!-- Contenido del formulario -->
                @livewire('create-agua-form')
            </div>
            </div>
          </div>
         
      </div>
  </div>
</div>
      <body>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
                 document.addEventListener('DOMContentLoaded', function () {
                          // Función para mostrar SweetAlert en la creación de lecturas
     function showAlert(message, icon, type) {
         Swal.fire({
             title: message,
             icon: icon,
             showCancelButton: false,
             confirmButtonColor: 'info',
             confirmButtonText: 'Aceptar'
         })
     }
              
            // Verifica si hay mensajes de sesión (éxito)
     @if(session('info'))
         showAlert('{{ session('info') }}', 'success', 'success');
     @endif
              
     // Verifica si hay mensajes de sesión (actualización)
     @if(session('update'))
         showAlert('{{ session('update') }}', 'info', 'warning');
     @endif
              
     // Verifica si hay mensajes de sesión (eliminación)
     @if(session('delete'))
         showAlert('{{ session('delete') }}', 'error', 'error');
     @endif
         });
         </script>
      </body>
</div>

