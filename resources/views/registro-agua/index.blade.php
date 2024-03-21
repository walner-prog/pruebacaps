<!-- resources/views/registro-agua/index.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-gradient-info ">
            <div class="card-header">
                <h1><i class="fas fa-chart-bar mr-2"></i>Estado de cuentas  del sistema de agua CAPS AMD</h1>
                        
            </div>
        </div>
    @stop
    
    
    @section('content')
        
                <livewire:registro-agua-table />
              
        {{-- En esta vista va todo el codigo   @if (session('info'))
    <div class="alert alert-success">
       <strong>{{ session('info') }}</strong>
   </div>
    @endif

    
    @if (session('update'))
    <div class="alert alert-warning">
       <strong>{{ session('update') }}</strong>
   </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger">
       <strong>{{ session('delete') }}</strong>
   </div>
    @endif

   <div class="card w-auto">
       <div class="card-body ">
          
          
      <table class="table table-striped table-bordered table-responsive">
      <thead>
      <tr>
       <th>ID</th>
       <th>Nombre de Usuario</th>
       <th>Mes</th>
       <th>Lectura Actual</th>
       <th>Lectura Anterior</th>
       <th>Consumo (M3)</th>
       <th>Valor por Metro Cúbico</th>
       <th>Saldo Anterior por Mora</th>
       <th>Total de Pago</th>
       <th>Valor Recibido</th>
     {{--   <th>Número de Recibo</th>    
       <th>Saldo Actual por Mora</th>
       <th>Número de Medidor</th>
       <th colspan="3">Acciones</th>
       </tr>
     </thead>
     <tbody>
      @foreach($registrosAgua as $registroAgua)
       <tr>
           <td>{{ $registroAgua->id }}</td>
           <td>{{ $registroAgua->NombreDeUsuario }}</td>
           <td>{{ $registroAgua->Mes }}</td>
           <td>{{ $registroAgua->LecturaActual }}</td>
           <td>{{ $registroAgua->LecturaAnterior }}</td>
           <td>{{ $registroAgua->ConsumoM3 }}</td>
           <td>{{ $registroAgua->ValoraMetroCubico }}</td>
           <td>{{ $registroAgua->SaldoAnteriorMora }}</td>
           <td>{{ $registroAgua->TotalPago }}</td>
           <td>{{ $registroAgua->ValorRecibido }}</td>
         {{--     <td>{{ $registroAgua->NumeroRecibo }}</td>  -
           <td>{{ $registroAgua->SaldoActualMora }}</td>
           <td>{{ $registroAgua->NumeroMedidor }}</td>
       
                <td> <a href="{{ route('registro-agua.show', $registroAgua->id) }}" class="btn btn-info">Ver</a></td>
                <td><a href="{{ route('registro-agua.edit', $registroAgua->id) }}" class="btn btn-warning">Editar</a></td>
                <td><form action="{{ route('registro-agua.destroy', $registroAgua->id) }}" method="POST" style="display:inline;">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</button>
               </form>
           </td>
       </tr>
       @endforeach
    </tbody>
   </table>

        <a href="{{ route('registro-agua.create') }}" class="btn btn-success">Crear Nuevo Registro</a>
   </div>
 </div>
--}}
   
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
