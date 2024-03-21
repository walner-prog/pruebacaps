{{-- @extends('layouts.app') --}}

<section>

  @extends('adminlte::page')
  
  @section('title', 'CAPS GNT')
  
  @section('content_header')
      <div class="card bg-primary text-white">
          <div class="card-header">
              <h1> Detalles del Ingreso </h1>
          </div>
      </div>
  @stop
  
  
  @section('content')
      <div class="card">
          <div class="card-body ">
         
 
            <p><strong>ID:</strong> {{ $ingreso->id }}</p>
            <p><strong>Concepto:</strong> {{ $ingreso->concepto }}</p>
            <p><strong>Nombre del mes:</strong>{{ $ingreso->nombre_mes }}</p>
            <p><strong>Monto:</strong> {{ $ingreso->monto }}</p>
            <p><strong>Fecha:</strong> {{ $ingreso->fecha }}</p>
            <p><strong>Mes:</strong> {{ $ingreso->mes }}</p>
        
            <a class="btn btn-warning btn-sm" href="{{ route('ingresos.edit', $ingreso->id) }}">Editar</a>
            <a class="btn btn-success btn-sm" href="{{ route('ingresos.index') }}">Volver a la lista de ingresos</a>
            
        
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
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
      <head>
  <!-- Otros elementos del encabezado... -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

