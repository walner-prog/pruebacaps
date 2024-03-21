{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Detalles del Gasto</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <p><strong>ID:</strong> {{ $gasto->id }}</p>
                <p><strong>Concepto:</strong> {{ $gasto->concepto }}</p>
                <p><strong>Nombre del mes:</strong>{{ $gasto->nombre_mes }}</p>
                <p><strong>Monto:</strong> {{ $gasto->monto }}</p>
                <p><strong>Fecha:</strong> {{ $gasto->fecha }}</p>
                <p><strong>Mes:</strong> {{ $gasto->mes }}</p>

         <a class="btn btn-warning btn-sm" href="{{ route('gastos.edit', $gasto->id) }}">Editar</a>
         <a class="btn btn-success btn-sm" href="{{ route('gastos.index') }}">Volver a la lista de gastos</a>

    
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
