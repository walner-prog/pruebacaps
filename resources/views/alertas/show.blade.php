<!-- alertas_automaticas/show.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
    <div class="card bg-primary text-white">
        <div class="card-header">
            <h1>Detalles de la Alerta Automática</h1>
        </div>
    </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                                     
           <p>ID: {{ $alertasAutomaticas->AlertaID }}</p>
           <p>Tipo de Alerta: {{ $alertasAutomaticas->Tipo_Alerta }}</p>
           <p>Descripción: {{ $alertasAutomaticas->Descripcion }}</p>
           <p>Descripción: {{ $alertasAutomaticas->Fecha_Hora_Activacion }}</p>
           
           <!-- Otros campos según tu modelo -->

    <a class="btn btn-primary btn-sm"  href="{{ route('alertas.index') }}">Volver a la Lista</a>
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

