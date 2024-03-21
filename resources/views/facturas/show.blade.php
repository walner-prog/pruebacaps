<!-- resources/views/facturas/show.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Detalles de la Factura</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <p>ID de la factura: {{ $factura->FacturaID }}</p>

                 <p>Cliente: @if (is_object($factura->cliente) && property_exists($factura->cliente->id))
                      {{ $factura->cliente->name }} </p>
                      @else
                      No hay información de cliente disponible
                      @endif
                
                      <p>Fecha de Emisión: {{ $factura->FechaDeEmision }}</p>
                      <p>Monto: {{ $factura->Monto }}</p>
                      <p>Estado de Pago: {{ $factura->Estado_Pago }}</p>
                     <p>ID del Cliente:{{ $factura->ClienteID }}</p> 
                <a class="btn btn-success btn-sm" href="{{ route('facturas.index') }}">Volver a la lista de facturas</a>
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
