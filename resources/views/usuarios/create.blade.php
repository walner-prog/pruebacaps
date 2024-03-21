<!-- resources/views/usuarios/create.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Crear Nuevo Usuario</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class=" form-control" name="name" required>
                      </div>
                      <div class="form-group">
                        
                         <label for="Direccion">Dirección:</label>
                         <input type="text" class=" form-control" name="Direccion" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class=" form-control" name="email" required>
                      </div>
                      <div class="form-group">
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    
                      </div>
                      <div class="form-group">
                          
                             <label for="Contacto">Datos de Contacto:</label>
                             <input type="text" class=" form-control" name="Contacto" required>
                      </div>
                   
                             <button class="btn btn-primary" type="submit">Guardar</button>
                </form>
                                 <a class="btn btn-success" href="{{ route('usuarios.index') }}">Volver a la lista de usuarios</a>
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

