{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Crear Nuevo gasto </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <form method="post" action="{{ route('gastos.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="concepto">Concepto:</label>
                        <input type="text" name="concepto" class=" form-control" required>
                        
                    </div>
                    <div class="form-group">
                        
                    <label for="monto">Monto:</label>
                    <input type="number" name="monto" class=" form-control" step="0.01" required>
                    
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" class=" form-control" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="mes">Mes:</label>
                        <input type="number" name="mes" class=" form-control" required>
                    
                    </div>
                    <div class="form-group">
                          
                    <label for="nombre_mes">Nombre del Mes:</label>
                    <select name="nombre_mes" class=" form-control" required>
                        <option value="enero">Enero</option>
                        <option value="febrero">Febrero</option>
                        <option value="marzo">Marzo</option>
                        <option value="abril">Abril</option>
                        <option value="mayo">Mayo</option>
                        <option value="junio">Junio</option>
                        <option value="julio">Julio</option>
                        <option value="agosto">Agosto</option>
                        <option value="septiembre">Septiembre</option>
                        <option value="octubre">Octubre</option>
                        <option value="noviembre">Noviembre</option>
                        <option value="diciembre">Diciembre</option>
                    </select>
            
                    </div>
                   
                   
            
            
                    <button class="btn btn-secondary btn-sm " type="submit">Guardar</button>
                </form>
                    <a  class="btn btn-success btn-sm " href="{{ route('gastos.index') }}">Volver a la lista de gastos</a>
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

