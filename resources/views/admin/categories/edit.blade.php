{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar una categoria </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
       
      @if (session('info'))
            <div class="alert alert-success">
                   <strong>{{ session('info') }}</strong>
            </div>
      @endif
    <div class="card">
        <div class="card-body text-dark">
            {!! Form::model($category,['route' =>['admin.categories.update', $category], 'method' => 'put' ]) !!}
              
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

                        {!! Form::submit('Actualizar categoria', ['class' => 'btn btn-primary']) !!}
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
        <script> console.log('Hi!'); </script>
    @stop
    </section>