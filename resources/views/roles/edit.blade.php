<!-- resources/views/roles/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Rol</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
    <div class="container">
        <h2>Editar Rol</h2>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

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

            <div class="form-group">
                <label for="name">Nombre del Rol:</label>
                <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Rol</button>
        </form>
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

