
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-gradient-info text-white">
            <div class="card-header text-center mw-100">
                <h1>Bienvenido aqui puedes hacer tu cambio de contraseña</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
    <body class="bg-gradient-info">

        <div class="container ">
    
            <!-- Outer Row -->
            <div class="row justify-content-center">
    
                <div class="col-xl-10 col-lg-12 col-md-9">
                  
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="card-header text-center font-weight-bold " >
                                    <style>
                                        .text-blue{
                                            font-family: 'Times New Roman', Times, serif;
                                            
                                        } 
                                    </style>
                                         <h1 class=" text-gray text-center">Cambiar contraseña</h1>  
                                </div>
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                 
                                </div>
                               
                                    
    
                                        <div class="card-body">
                                            @if(session('success'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                    
                                            <form method="POST" action="{{ route('change-password') }}">
                                                @csrf
                                                    
                                                <div class="form-group ">
                                                    <label for="current_password" class="form-label">Contraseña Actual</label>
                    
                                                    
                                                        <input id="current_password" type="password" class="form-control" name="current_password" required>
                                                        @error('current_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                  
                                                
                                            </div>
                                                <div class="form-group ">
                                                    <label for="new_password" class="form-label">Nueva Contraseña</label>
                    
                                                   
                                                        <input id="new_password" type="password" class="form-control" name="new_password" required>
                                                        @error('new_password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    
                                                </div>
                    
                                                <div class="form-group ">
                                                    <label for="new_password_confirmation" class="form-label ">Confirmar Nueva Contraseña</label>
                                                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                                                   
                                                </div>
                    
                                                <div class="form-group text-center ">
                                                        <button type="submit" class="btn btn-info">
                                                            Cambiar Contraseña
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                       
                                    
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
      </div>
    
      <script src="{{ asset('js/sweetalert2.js') }}"></script>
    </body>
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

