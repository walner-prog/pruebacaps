<!-- resources/views/usuarios/edit.blade.php -->

{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Roles y Permisos de {{ $usuario->name }}</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('usuarios_roles.update', $usuario->id) }}" method="post">
                    @csrf
                    @method('put')
                

                    <h2>Editar Usuario - {{ $usuario->name }}</h2>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            
                    <form method="post" action="{{ route('usuarios_roles.update', $usuario->id) }}">
                        @csrf
                        @method('PUT')
            
                        <!-- Campos de usuario -->
                        <div class="form-group">
                            <label for="name">Nombre de Usuario:</label>
                            <input type="text" name="name" value="{{ $usuario->name }}" class="form-control" readonly>
                        </div>
            

                    <label for="roles">Roles:</label>
                    <select name="roles[]" multiple>
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $usuario->hasRole($role->name) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                
                    <button type="submit">Guardar Roles</button>
                </form>
                
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



