<!-- resources/views/mantenimientos/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Mantenimiento</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
              
    <form action="{{ route('mantenimientos.update', $mantenimiento) }}" method="POST">
            @csrf
             @method('PUT')
                 <div class="form-group">
                    <label for="Tipo_Mantenimiento">Tipo de Mantenimiento:</label>
                    <input type="text" name="Tipo_Mantenimiento" class=" form-control" value="{{ $mantenimiento->Tipo_Mantenimiento }}" required>
                 </div>
                 <div class="form-group">
                    <label for="Fecha_Programacion" >Fecha de Programación:</label>
                    <input type="date" name="Fecha_Programacion" class=" form-control" value="{{ $mantenimiento->Fecha_Programacion }}"  required>
                 </div>
                 <div class="form-group">
                    <label for="Descripcion">Descripción:</label>
                    <textarea name="Descripcion" class=" form-control" required>{{ $mantenimiento->Descripcion }}</textarea>
                 </div>
                 <div class="form-group">
                    <label for="UsuarioID">Usuario:</label>
                    <select name="UsuarioID" class=" form-control" required>
                        @foreach($usuarios as $usuario)
                           <option value="{{ $usuario->id }}" {{ $mantenimiento->UsuarioID == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                       @endforeach
                   </select>
                 </div>
             
                      <button class="btn btn-secondary btn-sm" type="submit">Guardar cambios</button>
       </form>
                       <a class="btn btn-success btn-sm" href="{{ route('mantenimientos.index') }}">Volver a la lista de mantenimientos</a>
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

