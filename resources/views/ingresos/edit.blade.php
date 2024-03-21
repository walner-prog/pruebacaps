{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Ingreso </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <form method="post" action="{{ route('ingresos.update', $ingreso->id) }}">
                    @csrf
                    @method('PUT')
                     <div class="form-group">
                        <label for="concepto">Concepto:</label>
                        <input type="text" name="concepto" class=" form-control" value="{{ $ingreso->concepto }}" required>
                     </div>
                     <div class="form-group">
                          
                        <label for="monto">Monto:</label>
                        <input type="number" name="monto" class=" form-control"  step="0.01" value="{{ $ingreso->monto }}" required>
                     </div>
                     <div class="form-group">
                        <label for="fecha">Fecha:</label>
                       <input type="date" name="fecha" class=" form-control"  value="{{ $ingreso->fecha }}" required>
                     </div>
                     <div class="form-group">
                        <label for="mes">Mes:</label>
                        <input type="number" name="mes" class=" form-control"  value="{{ $ingreso->mes }}" required>
                     </div>
                     <div class="form-group">
                        <label for="nombre_mes">Nombre del Mes:</label>
                    <select name="nombre_mes" class=" form-control"  required>
                        <option value="enero" {{ $ingreso->nombre_mes == 'enero' ? 'selected' : '' }}>Enero</option>
                        <option value="febrero" {{ $ingreso->nombre_mes == 'febrero' ? 'selected' : '' }}>Febrero</option>
                        <option value="marzo" {{ $ingreso->nombre_mes == 'marzo' ? 'selected' : '' }}>Marzo</option>
                        <option value="abril" {{ $ingreso->nombre_mes == 'abril' ? 'selected' : '' }}>Abril</option>
                        <option value="mayo" {{ $ingreso->nombre_mes == 'mayo' ? 'selected' : '' }}>Mayo</option>
                        <option value="junio" {{ $ingreso->nombre_mes == 'junio' ? 'selected' : '' }}>Junio</option>
                        <option value="julio" {{ $ingreso->nombre_mes == 'julio' ? 'selected' : '' }}>Julio</option>
                        <option value="agosto" {{ $ingreso->nombre_mes == 'agosto' ? 'selected' : '' }}>Agosto</option>
                        <option value="septiembre" {{ $ingreso->nombre_mes == 'septiembre' ? 'selected' : '' }}>Septiembre</option>
                        <option value="octubre" {{ $ingreso->nombre_mes == 'octubre' ? 'selected' : '' }}>Octubre</option>
                        <option value="noviembre" {{ $ingreso->nombre_mes == 'noviembre' ? 'selected' : '' }}>Noviembre</option>
                        <option value="diciembre" {{ $ingreso->nombre_mes == 'diciembre' ? 'selected' : '' }}>Diciembre</option>
                    </select>
            
                     </div>
                   
            
                         <button  class="btn btn-secondary btn-sm" type="submit">Actualizar cambios</button>
                    
                </form>
                    <a class="btn btn-success btn-sm"  href="{{ route('ingresos.index') }}">Volver a la lista de ingresos</a>
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
