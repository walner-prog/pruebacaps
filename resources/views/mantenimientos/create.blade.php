<!-- resources/views/mantenimientos/create.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Programar Nuevo Mantenimiento</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
                <form action="{{ route('mantenimientos.store') }}" method="POST">
                    @csrf
                     
                       <div class="form-group">
                          <label for="Tipo_Mantenimiento">Tipo de Mantenimiento:</label>
                          <input type="text" name="Tipo_Mantenimiento" class=" form-control" required>
                       </div>

                       <div class="form-group">
                           <label for="Fecha_Programacion">Fecha de Programación:</label>
                           <input type="date" name="Fecha_Programacion" class=" form-control" required>
                       </div>

                       <div class="form-group">
                            <label for="Descripcion">Descripción:</label>
                             <textarea name="Descripcion" class=" form-control" required></textarea>
                       </div>

                       <div class="form-group">
                           <label for="UsuarioID">Usuario:</label>
                           <select name="UsuarioID" class=" form-control" required>
                            @foreach($usuarios as $usuario)
                              <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                           </select>
                       </div>
                    
                           <button  class="btn btn-secondary btn-sm " type="submit">Guardar</button>
                </form>
                         <a  class="btn btn-success btn-sm " href="{{ route('mantenimientos.index') }}">Volver a la lista de mantenimientos</a>
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
