@extends('layouts.app')

@section('content')
<body style="background-color:rgb(0, 0, 74)">
    <style>
       
        .register{
          
            background: linear-gradient(to bottom right, rgb(0, 0, 0), rgba(137, 142, 0, 0.5));
        }
        .enviar{
            text-align: center
        }
        strong{
            font-size: 42px
        }
    </style>
    <div class="container container-md" style="max-width: 800px">

        <!-- Outer Row -->
        <div class="row justify-content-center ">

            <div class="col-xl-10 col-lg-12 col-md-9">
                   
                <div class="card o-hidden " >
                    <div class="card-body register " style="justify-content: center;">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                           {{--  <div class="col-lg-6 d-none d-lg-block bg-login-image mt-5">
                                <img src="{{ asset('images/promo-1.png') }}" alt="Imagen del banner" class="img-fluid" style=" width: 100%;">
                            </div> --}}
                            <div class="col-lg-12" >
                                <h1 class=" text-blue fa-text-width font-weight-bold text-center "><STRong class=" text-purple"> <STRong class=" text-olive">CAPS</STRong >ADMIN</STRong> </h1>  
                                <div class="p-5">
                                    
                                        <h1 class="h4 text-gray font-weight-bold text-center">Registrate</h1>
      
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                             <div class="form-group font-weight-bold">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label text-gray">{{ __('Nombre') }}</label>
                                                    <input id="name" type="text" placeholder="Escribe tu nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                 </div>
                                             </div>
                                        
                                              <div class="form-group">

                                              </div>
                                        <div class="row mb-3 font-weight-bold">
                                            <label for="email" class="form-label text-gray">{{ __('Email o Correo') }}</label>
                                                     
                                                <input id="email" type="email" placeholder="Ingresa  tu correo" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        
                                           
                                        </div>
                
                                        <div class="form-group font-weight-bold">
                                            <div class="row mb-3">
                                                <label for="password" class="form-label text-gray">{{ __('Contraseña') }}</label>
                    
                                                    <input id="password" type="password" placeholder="Ingresa tu contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                               
                                            </div>
                                        </div>
                                        
                                         <div class="form-group font-weight-bold">
                                            <div class="row mb-3">
                                                <label for="password-confirm" class="form-label text-gray">{{ __('Confirmar Contraseña') }}</label>
                                                   <input id="password-confirm" type="password" placeholder="Confirma  tu contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
  
                                            </div>
                    
                                         </div>
                                        
                                        <div class="form-group font-weight-bold">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-success font-weight-bold">
                                                    {{ __('Enviar') }}
                                                </button>
                                            </div>
                                        </div>
                
                                    </form>
                                      <div class="form-group mr-6">
                                        <a class=" btn btn-info btn-sm btn-tool text-white " href="{{ route('login') }}">{{ __('Si ya estas registrado entra aqui') }}</a>
                                       
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
</body>
@endsection
