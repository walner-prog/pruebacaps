{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Lista de categorias , {{ Auth::user()->name }}.</h1>
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
             <div class="card-header">
                <a class="btn btn-secondary " href="{{route('admin.categories.create')}}">Agregar Categoria </a>
             </div>
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
                        @foreach ($categories as $category)
                              <tr>
                                  <td>{{ $category->id }}</td>
                                  <td>{{ $category->name }}</td>
                                  <td width="10px">
                                      <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                                  </td>
                                  <td width="10px">
                                       <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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