<!-- resources/views/roles/index.blade.php -->
{{-- @extends('layouts.app') --}}

<section>
  <head>
    <!-- Agrega estas líneas en tu vista -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

  </head>
    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Lista de Roles</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text">
            
                    <div class="card-header">
                        <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Crear Nuevo Rol</a>
                    </div>
                      
                           
                     <table  class="table table-striped table-responsive table-bordered" id="tabla-usuarios">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <a  class="btn btn-warning btn-sm" href="{{ route('usuarios_roles.edit', $role->id) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>

                                        </td>  
                                        <td>
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></</button>
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

        <script>
            document.getElementById('descargar-pdf').addEventListener('click', function() {
                // Crear una instancia de jsPDF
                var pdf = new jsPDF();
        
                // Obtener el elemento HTML que deseas convertir en PDF
                var element = document.getElementById('tabla-usuarios');
        
                // Usar html2canvas para convertir el elemento a una imagen
                html2canvas(element).then(function (canvas) {
                    // Agregar la imagen al PDF
                    pdf.addImage(canvas.toDataURL('image/png'), 'PNG', 0, 0, pdf.internal.pageSize.width, element.clientHeight);
        
                    // Descargar el PDF
                    pdf.save('tabla_usuarios.pdf');
                });
            });
        </script>
    @stop
    </section>


