{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Crear nuevo posts </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body font-weight-bold">
                {!! Form::open(['route' => 'admin.posts.store', 'autocomplete'=>'off']) !!}
                 {{-- Aca incluimos el id del usuario auntentificado  en dodne recogemos el valor del usuario  --}}   
                     {!! Form::hidden('user_id',auth()->user()->id ) !!}
                  
                <div class="form-group">
                    {!! Form::label('name', 'Nombre' ) !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del post']) !!}
                
                      @error('name')
                           <span class="text text-danger">{{ $message }}</span>
                      @enderror
                 </div>

            
                <div class="form-group">
                 {!! Form::label('slug', 'slug' ) !!}
                 {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug del post'  ]) !!}  {{-- readonly me deja sin poder escribir en el input --}}
               
                   @error('slug')
                   <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                    <div class="form-group">
                        {!! Form::label('category_id', 'categoria', ) !!}
                        {!! Form::select('category_id', $categories, null, ['class'=> 'form-control']) !!}
                    
                        
                        @error('category_id')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                       
                    <div class="form-group">
                        <p class=" font-weight-bold">Etiquetas</p>

                          @foreach ($tags as $tag)
                               <label class="mr-2" >
                                 {!! Form::checkbox('tags[]', $tag->id, null ) !!}
                                   {{ $tag->name }}
                               </label>
                          @endforeach

                          @error('tags')
                            <br>
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                            
                         

                    </div>
                       
                      <div class="form-group">
                        <p>Estado</p>

                        <label>
                            {!! Form::radio('status', 1, true, ['class'=>'text-warning']) !!}
                            Borrador
                        </label>

                        <label>
                            {!! Form::radio('status', 2, ['class'=>'text-warning']) !!}
                            Publicado
                        </label>
                         
                         

                         @error('status')
                         <br>
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror

                      </div>
                         
                          <div class="row mb-3">
                            <div class="col">
                                <div class=" image-wrapper">  <img id="picture" src="{{ asset('images/html.png') }}" alt="Logo de tu sitio web" width="100" height="100" style="margin-top: 0px "></div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('file','Imagen que se mostrara en el post') !!}
                                     {!! Form::file('file', ['class'=> 'form-control-file']) !!}
                                </div>
                            </div>
                          </div>
                    <div class="form-group">
                        {!! Form::label('extract', 'Extracto', ) !!}
                        {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                   
                        @error('extract')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror 

                    </div>

                    <div class="form-group">
                        {!! Form::label('body', 'Cuerpo del post', ) !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                   
                          @error('body')
                        <span class="text text-danger">{{ $message }}</span>
                          @enderror 
                   
                    </div>

                     {!! Form::submit('Crear post ', ['class' => 'btn btn-primary']) !!}
             
                     
               {!! Form::close() !!}
            </div>
        </div>
    @stop
    
    @section('css')
    <style>
       .image-wrapper {
        position: relative;
        padding-bottom: 56.25%;
    
       }
       .image-wrapper img{
          position: absolute;
          object-fit: cover;
          width: 100%;
          height: 100%;
       }
    </style>
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('js')
       <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-master/jquery.stringtoslug.min.js') }}"> </script>
      
       <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
   
   
   <script>
        $(document).ready(function(){
            $("#name").stringToSlug()({
                     setEvents: 'Keyup Keydown blur',
                     getPut: '#slug',
                     space: '-'
            });
        });
   

        


       
             ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        // cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
             var file = event.target.files[0];

             var reader = new FileReader();
             reader.onload = (event) =>{
                document.getElementById("picture").setAttribute('src', event.target.result);

             }

             reader.readAsDataURL(file);
        }
        </script>
    @stop
    </section>