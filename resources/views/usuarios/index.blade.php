{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Listado de usuarios </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body " id="table-usuario">
                
                    
                @can('crear-usuario')
                <div class="card-header">
                    <a class="btn btn-success btn-sm" href="{{ route('usuarios.create') }}"><i class="fas fa-plus-circle mr-2"></i>Crear Nuevo Usuario</a>
                </div>
                @endcan
                <div class="card-body ">

                    <table class="table table-striped table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Rol</th>
                        
    
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
    
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                     <td>
                                        @if (!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolname)
                                          <h5><span class=" badge-success">{{ $rolname }}</span></h5>
                                            @endforeach
                                        @endif
                                     </td>
                                    
                                     @can('editar-usuario')
                                         
                                 
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fas fa-pencil-alt mr-2"></i></a>
                                    </td>
                                    @endcan
                                      @can('borrar-usuario')
                                      <td><form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                                        </form>
                                   </td> 
                                      @endcan
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                      
                                <!-- Enlaces de paginación -->
                                <ul class="pagination">
                                    {{ $usuarios->links("pagination::bootstrap-4") }}
                                </ul>
                
                    
                </div>

                <a download="usuarios" href="table-usuario"><h6 class=" text-left pl-2">Descargar</h6></a> 
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