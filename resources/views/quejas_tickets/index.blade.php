<!-- quejas_tickets/index.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Quejas y Tickets</h1>
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
            <div class="card-header">
                <a class="btn btn-secondary btn-sm " href="{{ route('quejas_tickets.create') }}"><i class="fas fa-plus-circle mr-2"></i>Crear Nueva Queja o Ticket</a>

            </div>
            <div class="card-body ">
                <table  class="table table-striped table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Fecha de Creación</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <!-- Otros campos según tu modelo -->
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($quejasTickets as $quejaTicket)
                            <tr>
                                <td>{{ $quejaTicket->TicketID }}</td>
                               
                                <td>{{ $quejaTicket->Fecha_Creacion }}</td>
                                <td>{{ $quejaTicket->Descripcion }}</td>
                                <td>{{ $quejaTicket->Estado }}</td>
                                <!-- Otros campos según tu modelo -->
                                     <td><a class="btn btn-primary btn-sm"  href="{{ route('quejas_tickets.show', $quejaTicket) }}"><i class="fas fa-eye"></i></a></td>
                                     <td><a class="btn btn-warning btn-sm"  href="{{ route('quejas_tickets.edit', $quejaTicket) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                     <td>
                                        <form action="{{ route('quejas_tickets.destroy', $quejaTicket) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                          <button class="btn btn-danger btn-sm"  type="submit"><i class="fas fa-trash"></i></</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
             document.addEventListener('DOMContentLoaded', function () {
                      // Función para mostrar SweetAlert en la creación de lecturas
 function showAlert(message, icon, type) {
     Swal.fire({
         title: message,
         icon: icon,
         showCancelButton: false,
         confirmButtonColor: 'info',
         confirmButtonText: 'Aceptar'
     })
 }
          
        // Verifica si hay mensajes de sesión (éxito)
 @if(session('info'))
     showAlert('{{ session('info') }}', 'success', 'success');
 @endif
          
 // Verifica si hay mensajes de sesión (actualización)
 @if(session('update'))
     showAlert('{{ session('update') }}', 'info', 'info');
 @endif
          
 // Verifica si hay mensajes de sesión (eliminación)
 @if(session('delete'))
     showAlert('{{ session('delete') }}', 'error', 'error');
 @endif
     });
     </script>
        <script> console.log('Hi!'); </script>
    @stop
    </section>
