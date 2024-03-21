{{-- resources/views/profile/edit.blade.php --}}

@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <h1>Editar Perfil</h1>
@stop

@section('content')
    {{-- Contenido para la edición del perfil --}}
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('put')

        {{-- Agrega campos para la edición del perfil --}}
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" required>

        {{-- Otros campos y lógica de edición del perfil --}}
        {{-- Profile picture field --}}
  <div class="input-group mb-3">
    <input type="file" name="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror">

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-image"></span>
        </div>
    </div>

    @error('profile_picture')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
   </div>

   {{-- Code field --}}
   <div class="input-group mb-3">
    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
           value="{{ old('code', Auth::user()->code) }}" placeholder="{{ __('Code (5 digits)') }}">

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-key"></span>
        </div>
    </div>

    @error('code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
   </div>
        
        <button type="submit">Guardar Cambios</button>
    </form>
@stop
