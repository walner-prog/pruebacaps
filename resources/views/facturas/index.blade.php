<!-- resources/views/facturas/index.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-info text-white">
            <div class="card-header">
                <h1>Lista de Facturas</h1>
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
            @can('crear-factura')
                
          
        <div class="card-header">
            <a class="btn btn-success " href="{{ route('facturas.create') }}"><i class="fas fa-plus-circle mr-2"></i>Crear Nueva Factura</a>
        </div>
        @endcan
        <div class="card-body text-bg-info">
            <table class="table table-striped table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>FacturaID</th>
                            <th>Cliente</th>
                            <th>Fecha de Emisión</th>
                            <th>Monto</th>
                            <th>Estado de Pago</th>
                            <th>ClienteID</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facturas as $factura)
                            <tr>
                                <td>
                                    {{ $factura->ClienteID }}
                               </td>
                            
                                 <td>{{ $factura->name }}</td>
                            
                                <td>{{ $factura->FechaDeEmision }}</td>
                                <td>{{ $factura->Monto }}</td>
                                <td>{{ $factura->Estado_Pago }}</td>
                                <td>{{ $factura->ClienteID }}</td>

                                <td width="10px">
                                    <a class="btn btn-primary btn-sm" href="{{ route('facturas.show', $factura) }}"><i class="fas fa-eye"></i></a>
                                </td>
                                @can('editar-factura')
                                    
                                <td width="10px">
                                    <a class="btn btn-warning btn-sm" href="{{ route('facturas.edit', $factura) }}"><i class="fas fa-pencil-alt"></i></a>
                                </td >
                                @endcan
                                @can('borrar-factura')
                                <td width="10px">
                                    <form action="{{ route('facturas.destroy', $factura) }}" method="POST">
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
                confirmButtonColor: '#3085d6',
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
