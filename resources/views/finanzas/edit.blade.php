<!-- resources/views/finanzas/edit.blade.php -->

{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Finanza </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
                <div class="container">
                   
                    <form action="{{ route('finanzas.update', $finanza->id) }}" method="POST">
                        @csrf
                        @method('PUT')
            
                        <div class="form-group">
                            <label for="monto_pago">Monto de Pago:</label>
                            <input type="number" name="monto_pago" class="form-control" value="{{ $finanza->monto_pago }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="fecha_pago">Fecha de Pago:</label>
                            <input type="date" name="fecha_pago" class="form-control" value="{{ $finanza->fecha_pago }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="saldo_actual_mora">Saldo Actual por Mora:</label>
                            <input type="number" name="saldo_actual_mora" class="form-control" value="{{ $finanza->saldo_actual_mora }}" required>
                        </div>
            
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
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

