{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-info text-white">
            <div class="card-header">
                <h1> Listado de Ingresos </h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
                <div class="card-header">
                    <a class="btn btn-success " href="{{ route('ingresos.create') }}"><i class="fas fa-plus-circle mr-2"></i>Crear un nuevo  ingreso</a>
                </div>
                @if (session('create'))
                <div class="alert alert-success">
                   <strong><i class=" fas fa-check mr-2"></i>{{ session('create') }}</strong>
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
                
        
           <table class="table table-striped table-responsive table-bordered">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Concepto</th>
                       <th>Nombre del Mes</th>
                       <th>Monto</th>
                       <th>Fecha</th>
                       <th>Mes</th>
                       <th colspan="3">Acciones</th>
                   </tr>
               </thead>
               <tbody>
                   <!-- Mostrar la tabla de ingresos -->
                   @foreach ($ingresos as $ingreso)
                       <tr>
                           <td>{{ $ingreso->id }}</td>
                           <td>{{ $ingreso->concepto }}</td>
                           <td>{{ $ingreso->nombre_mes }}</td>
                           <td>{{ $ingreso->monto }}</td>
                           <td>{{ $ingreso->fecha }}</td>
                           <td>{{ $ingreso->mes }}</td>
                           <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{ route('ingresos.show', $ingreso->id) }}"><i class="fas fa-eye"></i></a>
                        </td>
                        <td  width="10px">  
                             <a class="btn btn-warning btn-sm" href="{{ route('ingresos.edit', $ingreso->id) }}"><i class="fas fa-pencil-alt"></i></a>
                        </td>
                        <td width="10px">
                            <form method="post" action="{{ route('ingresos.destroy', $ingreso->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
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

