<!-- resources/views/lecturas/show.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1 class=" text-center">CAPS BETESDA</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <p>LecturaID:{{ $lectura->LecturaID }}</p>
                 <p>MedidorID:{{ $lectura->MedidorID }}</p>
                 <p>UsuarioID:{{ $lectura->UsuarioID }}</p>
                
                <p>Fecha de Lectura: {{ $lectura->Fecha_Lectura }}</p>
                <p>Cantidad de Agua Leída: {{ $lectura->Cantidad_Agua_Leida }}</p>
                <a class="btn btn-primary btn-sm" href="{{ route('lecturas.index') }}">Volver a la lista de lecturas</a>
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
