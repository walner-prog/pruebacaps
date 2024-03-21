{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>CAPS RTC </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body">
                
                <form method="post" action="{{ route('roles.update',$role->id) }}">
                    @csrf
                    @method('PUT')
                   <div class="form-group">
                    {!! Form::label('name', 'Nombre del rol' ) !!}
                    <input type="text" name="name" value="{{ $role->name }}" class="form-control" >
                
                      @error('name')
                           <span class="text text-danger">{{ $message }}</span>
                      @enderror
                   </div>

                 <div class="form-group">
                    {!! Form::label('', 'Permisos para este rol' ) !!} <br>
                       
                    @foreach($permission as $value)
                    <label for="">{{ Form::checkbox('permission[]', $value->id,false,array('class'=>'name')) }}
                      {{ $value->name }}
                    </label>
                    <br>
                    @endforeach
                
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