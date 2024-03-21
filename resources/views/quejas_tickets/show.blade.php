<!-- quejas_tickets/show.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Detalles de la Queja o Ticket</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body">
              
                <p>ID: {{ $quejasTickets->TicketID }}</p>
                {{--  <p>Usuario: {{ $quejasTickets->usuario->name }}</p>  --}}
                <p>Fecha de Creación: {{ $quejasTickets->Fecha_Creacion }}</p>
                <p>Descripción: {{ $quejasTickets->Descripcion }}</p>
                <p>Estado: {{ $quejasTickets->Estado }}</p>
                <!-- Otros campos según tu modelo -->
                
                <a class="btn btn-success btn-sm" href="{{ route('quejas_tickets.index') }}">Volver a la Lista</a>
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

