{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Crear usuarios </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                  
                <form method="post" action="{{ route('usuarios.store') }}">
                    @csrf
                  
                  
                <div class="form-group">
                    {!! Form::label('name', 'Nombre' ) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del usuario']) !!}
                
                      @error('name')
                           <span class="text text-danger">{{ $message }}</span>
                      @enderror
                 </div>

                 <div class="form-group">
                    {!! Form::label('email', 'Email' ) !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el email del usuario']) !!}
                
                      @error('email')
                           <span class="text text-danger">{{ $message }}</span>
                      @enderror
                 </div>
                  
                 <div class="form-group">
                    {!! Form::label('password', 'Password' ) !!}
                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la password ']) !!}
                
                      @error('password')
                           <span class="text text-danger">{{ $message }}</span>
                      @enderror
                 </div>

                  
                 
                  
                 <div class="form-group">
                    <label for="">Roles</label>
                    {!! Form::select('roles[]',$roles,[], ['class' => 'form-control', 'placeholder' => 'Ingrese los roles']) !!}
                
                      @error('')
                           <span class="text text-danger">{{ $message }}</span>
                      @enderror
                 </div>

               
                 <button class="btn btn-secondary btn-sm " type="submit">Guardar</button>
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