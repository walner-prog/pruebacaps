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
            <div class="card-body text-success">
                <div class="card-header">
                    @can('crear-rol')
                         <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}">
                         <i class="fas fa-plus-circle mr-2"></i>Crear Nuevo rol</a>
                        @endcan
                  </div>

                
                    <table class="table table-striped">
                       <thead class=" bg-gradient-dark">
                         <tr>
                           <th>Rol</th>
                           
                           <th colspan="2"></th>
                         </tr>
                       </thead>
   
                       <tbody>
                           @foreach ($roles as $role)
                                 <tr>
                                   
                                     <td>{{ $role->name }}</td>

                                     @can('editar-rol')
                                     <td width="10px">
                                         <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                     </td>
                                     @endcan
                                      @can('borrar-rol')
                                          
                                       <td width="10px">
                                          <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                         </form>
                                     </td>
                                     @endcan
                                 </tr>
                               
                           @endforeach
                       </tbody>
                    </table>
                   
                                <!-- Enlaces de paginación -->
                                <ul class="pagination">
                                    {{ $roles->links("pagination::bootstrap-4") }}
                                </ul>
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