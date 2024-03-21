<!-- resources/views/registro-agua/show.blade.php -->

@extends('adminlte::page')

@section('title', 'CAPS GNT')

@section('content_header')
    <div class="card bg-primary text-white">
        <div class="card-header">
            <h1>Detalles del registro del agua</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $registrosAgua->id }}</p>
                        <p><strong>Mes:</strong> {{ $registrosAgua->Mes }}</p>
                        <p><strong>Lectura Actual:</strong> {{ $registrosAgua->LecturaActual }}</p>
                        <p><strong>Lectura Anterior:</strong> {{ $registrosAgua->LecturaAnterior }}</p>
                        <p><strong>Consumo (M3):</strong> {{ $registrosAgua->ConsumoM3 }}</p>
                        <p><strong>Valor por Metro Cúbico:</strong> {{ $registrosAgua->ValoraMetroCubico }}</p>
                        <p><strong>Saldo Anterior por Mora:</strong> {{ $registrosAgua->SaldoAnteriorMora }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Total de Pago:</strong> {{ $registrosAgua->TotalPago }}</p>
                        <p><strong>Valor Recibido:</strong> {{ $registrosAgua->ValorRecibido }}</p>
                        <p><strong>Número de Recibo:</strong> {{ $registrosAgua->NumeroRecibo }}</p>
                        <p><strong>Saldo Actual por Mora:</strong> {{ $registrosAgua->SaldoActualMora }}</p>
                        <p><strong>Número de Medidor:</strong> {{ $registrosAgua->NumeroMedidor }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('registro-agua.edit', $registrosAgua->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('registro-agua.destroy', $registrosAgua->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</button>
            </form>
            <a href="{{ route('registro-agua.index') }}" class="btn btn-secondary">Volver a la Lista</a>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
