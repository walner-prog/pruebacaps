<!-- alertas/index.blade.php -->
<section>
    <head>
        
    <!-- Incluir jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Incluye SweetAlert2 desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- Incluir Bootstrap desde CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-info text-white">
            <div class="card-header">
                <h1>Alertas Automáticas</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')

                             
         @if (session('info'))
         <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
         @endif

         
         @if (session('update'))
         <div class="alert alert-warning">
            <strong>{{ session('update') }}</strong>
        </div>
         @endif

         @if (session('delete'))
         <div class="alert alert-danger">
            <strong>{{ session('delete') }}</strong>
        </div>
         @endif
                    
        <div class="card">
            
            <div class="card-body">
                    <div class="card-header">
                        <a class="btn btn-danger btn-sm " href="{{ route('alertas.reporte') }} " target=" blank"><i class=" fas fa-file-pdf mr-2"></i>PDF</a>
                        @can('crear-alerta')
                        <!-- Modifica tu botón para abrir el modal -->
                     <button class="btn btn-secondary btn-sm float-right ml-2" type="button" data-toggle="modal" data-target="#formularioModal">
                                       Abrir Formulario
                     </button>
                     @endcan
                     @can('crear-alerta')
                        <a class="btn btn-success btn-sm float-right " href="{{ route('alertas.create') }}"><i class="fas fa-plus-circle mr-2"></i>Crear Nueva Alerta Automática</a>
                    </div>
                    @endcan
           
            
         <table class="table table-striped table-responsive table-bordered">
                <thead>
                    <tr class=" bg-gradient-dark bg-opacity-75">
                        <th>ID</th>
                        <th>Tipo de Alerta</th>
                        <th>Descripción</th>
                        <th>Fecha_Hora_Activacion</th>
                        <th>ID del Usuario</th>
                        <!-- Otros campos según tu modelo -->
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>
              <tbody>
            @foreach ($alertasAutomaticas as $alertaAutomatica)
                <tr>
                    <td>{{ $alertaAutomatica->AlertaID }}</td>
                    <td>{{ $alertaAutomatica->Tipo_Alerta }}</td>
                    <td>{{ $alertaAutomatica->Descripcion }}</td>
                    <td>{{ $alertaAutomatica->Fecha_Hora_Activacion }}</td>
                    <td>{{ $alertaAutomatica->UsuarioID }}</td>
                    	 
                    <!-- Otros campos según tu modelo -->
                
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('alertas.show', $alertaAutomatica) }}"> <i class="fas fa-eye"></i></a>
                    </td>
                    
                    @can('editar-alerta')
                     <td>
                             <a class="btn btn-warning btn-sm" href="{{ route('alertas.edit', $alertaAutomatica) }}"><i class="fas fa-pencil-alt"></i></a>
                     </td>
                     @endcan
                     @can('editar-alerta')
                         <td>
                            <form action="{{ route('alertas.destroy', $alertaAutomatica) }}" method="POST">
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


                <!-- Agrega esto al final de tu vista -->
<div class="modal fade" id="formularioModal" tabindex="-1" role="dialog" aria-labelledby="formularioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formularioModalLabel">Formulario de Alerta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí colocarás tu formulario -->
                @livewire('alertas-create') 
            </div>
            
        </div>
    </div>
</div>

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

    <!-- Agrega esto al final de tu vista -->
   <!-- Agrega esto al final de tu vista -->
<script>
    $(document).ready(function () {
        $('#formularioModal').on('hidden.bs.modal', function (e) {
            $('#formularioModal').modal('hide');
             $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();

            // Limpiar el formulario después de cerrar el modal
            $('#miFormulario').trigger('reset');
        });

        $('#miFormulario').on('submit', function (e) {
            e.preventDefault(); // Evita el envío estándar del formulario
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Oculta el modal manualmente
                    $('#formularioModal').modal('hide');

                    // Muestra una alerta con SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Formulario enviado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function (error) {
                    // Manejar errores
                    console.log(error);
                }
            });
        });
    });
</script>

    
    
    

        <script> console.log('Hi!'); </script>
    @stop
    </section>

