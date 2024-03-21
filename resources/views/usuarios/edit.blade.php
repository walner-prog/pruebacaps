<!-- resources/views/usuarios/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Usuario</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
                <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                    @csrf
                    @method('PUT')
                     <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" name="name" class=" form-control" value="{{ $usuario->name }}" required>
                     </div>
                     <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email"  class=" form-control" value="{{ $usuario->email }}" required>
                     </div>
                     <div class="form-group">
                          
                          <label for="Direccion">Dirección:</label>
                           <input type="text" name="Direccion"  class=" form-control" value="{{ $usuario->Direccion }}" required>
                     </div>
                     <div class="form-group">
                        <label for="Contacto">Datos de Contacto:</label>
                        <input type="text" name="Contacto"  class=" form-control" value="{{ $usuario->Contacto }}" required>
                     </div>
                     <div class="form-group">
                        <label for="FechaDeRegistro">FechaDeRegistro:</label>
                        <input type="date" name="FechaDeRegistro"  class=" form-control" value="{{ $usuario->FechaDeRegistro }}" required>
                     </div>
                   
                           <button class="btn btn-primary" type="submit">Guardar cambios</button>
                </form>
                <a class="btn btn-success btn-sm"  href="{{ route('usuarios.index') }}">Volver a la lista de usuarios</a>
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


