{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar gastos </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <form method="post" action="{{ route('gastos.update', $gasto->id) }}">
                    @csrf
                    @method('PUT')
                    
                     <div class="form-group">
                        <label for="concepto">Concepto:</label>
                        <input type="text" name="concepto" class=" form-control" value="{{ $gasto->concepto }}" required>
                     </div>
                     <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" name="monto" class=" form-control" step="0.01" value="{{ $gasto->monto }}" required>
                        
                     </div>
                     <div class="form-group">
                          
                        <label for="fecha">Fecha:</label>
                         <input type="date" name="fecha" class=" form-control" value="{{ $gasto->fecha }}" required>
                    
                     </div>
                     <div class="form-group">
                        <label for="mes">Mes:</label>
                        <input type="number" name="mes" class=" form-control" value="{{ $gasto->mes }}" required>
                     </div>
                     <div class="form-group">
                        
                     <label for="nombre_mes">Nombre del Mes:</label>
                      <select name="nombre_mes" class=" form-control" required>
                        <option value="enero" {{ $gasto->nombre_mes == 'enero' ? 'selected' : '' }}>Enero</option>
                        <option value="febrero" {{ $gasto->nombre_mes == 'febrero' ? 'selected' : '' }}>Febrero</option>
                        <option value="marzo" {{ $gasto->nombre_mes == 'marzo' ? 'selected' : '' }}>Marzo</option>
                        <option value="abril" {{ $gasto->nombre_mes == 'abril' ? 'selected' : '' }}>Abril</option>
                        <option value="mayo" {{ $gasto->nombre_mes == 'mayo' ? 'selected' : '' }}>Mayo</option>
                        <option value="junio" {{ $gasto->nombre_mes == 'junio' ? 'selected' : '' }}>Junio</option>
                        <option value="julio" {{ $gasto->nombre_mes == 'julio' ? 'selected' : '' }}>Julio</option>
                        <option value="agosto" {{ $gasto->nombre_mes == 'agosto' ? 'selected' : '' }}>Agosto</option>
                        <option value="septiembre" {{ $gasto->nombre_mes == 'septiembre' ? 'selected' : '' }}>Septiembre</option>
                        <option value="octubre" {{ $gasto->nombre_mes == 'octubre' ? 'selected' : '' }}>Octubre</option>
                        <option value="noviembre" {{ $gasto->nombre_mes == 'noviembre' ? 'selected' : '' }}>Noviembre</option>
                        <option value="diciembre" {{ $gasto->nombre_mes == 'diciembre' ? 'selected' : '' }}>Diciembre</option>
                      </select>
                     </div>
                    
                         <button  class="btn btn-secondary btn-sm" type="submit">Actualizar cambios</button>
                    
                </form>
                    <a class="btn btn-success btn-sm"  href="{{ route('gastos.index') }}">Volver a la lista de gastos</a>
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
