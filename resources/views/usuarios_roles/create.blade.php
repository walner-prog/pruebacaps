{{-- resources/views/roles/create.blade.php --}}

@extends('adminlte::page')

@section('title', 'CAPS GNT')

@section('content_header')
    <div class="card bg-primary text-white">
        <div class="card-header">
            <h1>Crear un nuevo rol</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre del Rol:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Rol</button>
            </form>
        </div>
    </div>
@stop
