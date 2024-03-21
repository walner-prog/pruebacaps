{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
               
                    <a class="btn btn-secondary btn-sm float-right " href="{{ route('admin.tags.create') }}">Agregar nueva etiqueta </a>
                
                <h1>Mostrar listado de etiquetas</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')

    @if (session('info'))
           <div class="alert alert-danger">
           <strong>{{ session('info') }}</strong>
          </div>
        @endif

        <div class="card">
            <div class="card-body text-bg-info">
                <table class="table table-striped">
                   <thead>
                     <tr>
                       <th>ID</th>
                       <th>NAME</th>
                       <th colspan="2"></th>
                     </tr>
                   </thead>

                   <tbody>
                       @foreach ($tags as $tag)
                             <tr>
                                 <td>{{ $tag->id }}</td>
                                 <td>{{ $tag->name }}</td>
                                 <td width="10px">
                                     <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                                 </td>
                                 <td width="10px">
                                      <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                     </form>
                                 </td>
                             </tr>
                           
                       @endforeach
                   </tbody>
                </table>
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