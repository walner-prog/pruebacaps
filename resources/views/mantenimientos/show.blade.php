<!-- resources/views/mantenimientos/show.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Detalles del Mantenimiento</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <p>ID: {{ $mantenimiento->MantenimientoID }}</p>
                <p>Tipo de Mantenimiento: {{ $mantenimiento->Tipo_Mantenimiento }}</p>
                <p>Fecha de Programación: {{ $mantenimiento->Fecha_Programacion }}</p>
                <p>Descripción: {{ $mantenimiento->Descripcion }}</p>
                <p>UsuarioID: {{ $mantenimiento->UsuarioID }}</p>
              {{--    <p>Usuario: {{ $mantenimiento->Usuario->name }}</p>   --}}
                <a class="btn btn-success btn-sm" href="{{ route('mantenimientos.index') }}">Volver a la lista de mantenimientos</a>
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
 
  
@endsection
