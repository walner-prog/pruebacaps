@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <div class="card-header text-center">
        <h1>Editar Perfil</h1>
    </div>
                
@stop

@section('content')
<div class="container ">

    
    @if (session('info'))
    <div class="alert alert-info">
           <strong>{{ session('info') }}</strong>
    </div>
@endif
    <h2 class="text-center animate__animated animate__fadeIn"></h2>
    <!-- El elemento con la clase "animate__animated animate__fadeIn" tendrá una animación de desvanecimiento -->
    <div class="row justify-content-center animate__animated animate__fadeIn">
        <div class="col-md-8">
            <div class="card " style="background-color:#930167; ">
                    <div class="card-header text-bold text-white text-center">
                    <h3>Mi Perfil</h3>
                    </div>
                   </div>
                <div class="card-body text-dark bg-gradient-indigo " style="border-color: #930167" style="border-style: solid" style="background-color: #930167">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input id="name" type="text" class="form-control " style="border-bottom: #930167" name="name" value="{{ Auth::user()->name }}" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="profile_photo">Foto de Perfil:</label>
                            <input id="profile_photo" type="file" class="form-control" name="profile_photo">
                            @if(Auth::user()->profile_photo)
                            <img src="{{ asset('images/' . Auth::user()->profile_photo) }}" alt="Foto de Perfil" width="100">
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Actualizar Perfil</button>

                        </div>
                    </form>
                         <div class="form-group">
                            @if (Route::has('password.request'))
                                <a class="btn btn-info btn-outline-indigo" href="{{ route('change-password') }}">
                                    {{ __('Cambiar contraseña?') }}
                                </a>
                            @endif  
                         </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@stop
