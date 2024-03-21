{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Detalles de Finanzas  </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body  ">
                <div class="container">
                    
                    <div>
                        <p><strong>ID:</strong> {{ $finanza->id }}</p>
                        <p><strong>Monto de Pago:</strong> {{ $finanza->monto_pago }}</p>
                        <p><strong>Fecha de Pago:</strong> {{ $finanza->fecha_pago }}</p>
                        <p><strong>Saldo Actual por Mora:</strong> {{ $finanza->saldo_actual_mora }}</p>
                        <!-- Agrega más detalles según sea necesario -->
                    </div>
                </div>
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


