<!-- quejas_tickets/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar  quejasTickets </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
              


                <a  class="btn btn-success btn-sm" href="{{ route('quejas_tickets.index') }}">Volver a la lista de tickets  </a>
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
    <h1>Editar Queja o Ticket</h1>

    <form action="{{ route('quejas_tickets.update', $quejasTickets) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campos del formulario con valores actuales según tu modelo -->
        <button type="submit">Actualizar</button>
    </form>
@endsection
