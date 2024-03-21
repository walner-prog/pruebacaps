@extends('layouts.app')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
</head>

@section('content')

<body class="" style="background-color:rgb(0, 0, 74)">

    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger">
           <strong>{{ session('error') }}</strong>
       </div>
        @endif

        <!-- Outer Row -->
        <div class="row justify-content-center " >

        <div class="container container-md-6 container-sm-6 mt-auto mb-auto " style="max-width: 500px">

     

            <div class="col-xl-10 col-lg-12 col-md-9 mr-auto ml-auto col-sm-8 ">
              
                <div class="card o-hidden border-0 shadow-lg my-5 mr-0 ml-0 pr-4 login pt-4  " style="justify-content: center;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="margin-right: auto" style="margin-lefht: auto" >
                            
                                <style>
                                    .text-blue{
                                        font-family: 'Times New Roman', Times, serif;
                                        justify-content: center;
                                        
                                    } 
                                    .login{
                                        background-color:rgb(0, 0, 0)
                                    }
                                    .enviar{
                                        text-align: center
                                    }
                                    strong{
                                        font-size: 42px
                                    }
                                       .container{
                                        margin-bottom: auto;
                                        margin-top: 4%;
                                       }
                                       body{
                                        background: linear-gradient(to bottom right, rgba(0, 0, 74, 0.5), rgba(14, 22, 48, 0.5));
                                       }
                                   
                                </style>
                                       <h1 class=" text-blue  font-weight-bold text-center mr-auto ml-auto "><STRong class=" text-purple"> <STRong class=" text-olive">CAPS</STRong >ADMIN</STRong> </h1>  
                        
                                      
                            {{--  <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{ asset('images/facts.jpg') }}" alt="Imagen del banner" class="img-fluid" style=" width: 100%;">
                            </div> --}}
                            <div class="col-lg-12 col-md-12 justify-content-center" >
                                <div class="p-4">
                                   
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                           
                                        <div class="mb-3 font-weight-bold email">
                                            <div class="form-group justify-content-center text-center ">
                                                <label for="email" class="form-label text-gray">{{ __('Ingresa tu correo') }}</label>
                                               <i class="fas fa-users text-white"></i>  <input id="email" type="email" placeholder="Ingresa tu correo" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                         <br>
                                                        <span class=" text-danger">El correo o clave  que ingresate son  incorrectos</span>
                                                    </div>
                                                @enderror
                                            </div>
                                           
                                            
                                        </div>
                
                                        <div class="mb-3 font-weight-bold pasword">

                                            <div class="form-group justify-content-center text-center">
                                                 <label for="password" class="form-label text-gray">{{ __('ingresa tu password') }}</label> <i class="fas fa-address-card text-white"></i> 
                                                 <input id="password" type="password" placeholder="ingresa tu password" class="form-control form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                @error('password')
                                                   <div class="invalid-feedback">
                                                  
                                                  <span class=" text-danger">La contrase;a  que ingresate es  incorrecta</span>
                                                </div>
                                                @enderror
                                            </div>
                                              
                                        </div>
                
                                        <div class="form-group text-center ">
                                            <div class="mb-3 form-check font-weight-bold text-gray">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label " style="opacity: 50" for="remember">{{ __('Recordarme') }}</label>
                                            </div>
                                        </div>
                
                                          <div class="form-group enviar ">
                                            <div class="mb-3 font-weight-bold ">
                                                <button type="submit" class="  btn btn-success  text-dark font-weight-bold text-center">{{ __('Enviar') }}</button>
                                               
                                            </div>
                                          </div>
                                    </form>

                                    <hr>
                                    <div class="text-center font-weight-bold">
                                        <a class="nav-link small text-indigo " style="font-size: 20px" href="{{ route('register') }}">{{ __('Registrate si no lo as hecho') }}</a>
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

  </div>

  <script src="{{ asset('js/sweetalert2.js') }}"></script>

</body>

</html>
@endsection
