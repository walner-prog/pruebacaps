{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1> Crear una categoria  </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-dark">
                {!! Form::open(['route' => 'admin.categories.store']) !!}
                  
                       <div class="form-group">
                           {!! Form::label('name', 'Nombre' ) !!}
                           {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}
                       
                             @error('name')
                                  <span class="text text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                       
                       <div class="form-group">
                        {!! Form::label('slug', 'slug' ) !!}
                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoria']) !!}
                      
                        @error('slug')
                        <span class="text text-danger">{{ $message }}</span>
                   @enderror
                       </div>

                            {!! Form::submit('Guardar categoria', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
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
        <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-master/jquery.stringtoslug.min.js') }}"> </script>
        <script>
            $(document).ready(function(){
                $("#name").stringToSlug()({
                         setEvents: 'Keyup Keydown blur',
                         getPut: '#slug',
                         space: '-'
                });
            });
        </script>
    @stop
    </section>