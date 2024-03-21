<!-- resources/views/lecturas/index.blade.php -->
{{-- @extends('layouts.app') --}}

<section>
   
    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-gradient-info text-white">
            <div class="card-header">
                <h1><i class="fas fa-list mr-2"></i> Lista de Lecturas de Medidores</h1>
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
                <div class="row">
                    <div class="col-4">
               {{-- <a class="btn btn-success btn-sm" href="{{ route('lecturas.create') }}"><i class="fas fa-plus-circle mr-2"></i>Crear Nueva Lectura</a> --}} 
               
                 @can('crear-lectura')
                 <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#crearLecturaModal">
                    Crear Nueva Lectura
                </button>
                @endcan
                </div>  
                    <div class="col-4 float-left">
                        <form action="{{ route('lecturas.buscar') }}" method="GET">
                            <div class="form-group mb-5 ">
                                <label for="mes">Buscar por Mes:</label>
                                <input type="text" name="mes" class="form-control input-sm" placeholder="Escribe el mes">
                            </div>
                        </div>  
                            <div class="col-4">
                            <div class="form-group mb-3 ">
                                <label for="usuario">Buscar por Nombre de Usuario:</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Escribe el nombre de usuario">
                            </div>
            
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>
                </div>
                
            </div>
           
            <div class="card-body " style="background-color: ivory">
                
               <a href="{{ route('lecturas.excel') }}">excel</a> 

               
             @if (isset($mensaje))
            <div class="alert alert-info">
                {{ $mensaje }}
             </div>
            
              @else
                <table class="table table-striped table-responsive table-bordered">
                    <thead class=" bg-gradient-lightblue border-width-3 text-dark">
                        <tr class="">
                            <th >LecturaID</th>
                            <th>Nombre</th>
                            <th>Lectura Anterior</th>
                            <th>Lectura Actual</th>
                            <th>Consumo Agua</th>
                            <th>Periodo Del</th>
                            <th>Periodo Al</th>
                            <th>  Mes Leido</th>
                            <th>Fecha de Lectura</th>
                            <th>Valor Cordoba</th>
                          
                            <th>Numero de recibo</th> 
                            <th>UsuarioID</th>
                            <th>Codigo</th>
                           
                                <th colspan="3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lecturas as $lectura)
                            <tr class=" bg-gradient-dark">
                                <td>{{ $lectura->LecturaID }}</td>
                                <td>{{ $lectura->name }}</td>
                                <td>{{ $lectura->Lectura_Anterior }}</td>
                                <td>{{ $lectura->Lectura_Actual }}</td>
                                <td>{{ $lectura->Consumo_Agua }}</td>
                                <td>{{ $lectura->Periodo_Del }}</td>
                                <td>{{ $lectura->Periodo_Al }}</td>
                                <td>{{ $lectura->Mes_Leido }}</td>
                                <td>{{ $lectura->Fecha_Lectura }}</td>
                                <td>{{ $lectura->Valor_Cordoba }}</td>
                                 {{--    <td>{{ $lectura->MedidorID }}</td> --}}
                                <td>{{ $lectura->Numero_Recibo }}</td>
                                <td>{{ $lectura->UsuarioID }}</td>
                                <td>{{ $lectura->codigo }}</td>
                               
              
                                
                                 <td>   <a class="btn btn-primary btn-sm" href="{{ route('lecturas.show', $lectura) }}"><i class="fas fa-eye"></i></a></td>
                                 @can('editar-lectura')
                                   <td> <a class="btn btn-warning btn-sm" href="{{ route('lecturas.edit', $lectura) }}"><i class="fas fa-pencil-alt"></i></a></td>
                                 @endcan
                                   @can('borrar-lectura')
                                   <td><form action="{{ route('lecturas.destroy', $lectura) }}" method="POST">
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
                @endif
                <!-- Modal -->
    <div class="modal fade" id="crearLecturaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Lectura de Medidor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('lecturas.store') }}" method="POST">
                        @csrf
    
    
                      {{--   <div class="form-group">
                            <label for="MedidorID">MedidorID:</label>
                            <select name="MedidorID" class=" form-control" required>
                                @foreach($medidores as $medidor)
                                    <option value="{{ $medidor->id }}">{{ $medidor->id }}</option>
                                @endforeach
                            </select>
                        </div> --}}
    
                        
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <select  name="name" class=" form-control" required>
                               @foreach($usuarios as $usuario)
                                <option class=" bg-gradient-green border border-bottom-4 border-black" value="Usuarios
                                ">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="codigo">Codigo:</label>
                            <select name="codigo" class=" form-control" >
                                @foreach($medidores as $medidor)
                                    <option class=" bg-gradient-green" value="{{ $medidor->codigo }}">{{ $medidor->codigo }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group">
                            <label for="UsuarioID">UsuarioID:</label>
                            <select name="UsuarioID" class=" form-control" required>
                               @foreach($usuarios as $usuario)
                                <option class=" bg-gradient-green" value="{{ $usuario->id }}">{{ $usuario->id }}</option>
                                @endforeach
                            </select>
                        </div> 
    
                      
                        
                        <div class="form-group">
                            <label for="Lectura_Actual">Lectura Actual:</label>
                            <input type="number" name="Lectura_Actual" class="form-control" required>
                        </div>
    
                            <!-- Mostrar la última lectura del usuario seleccionado -->
                               <div class="form-group">
                                <label for="Lectura_Anterior">Lectura Anterior:</label>
                                <input type="number" name="Lectura_Anterior" class="form-control">
                                </div>                              
    
                        <div class="form-group">
                            <label for="Cantidad_Agua_Leida">Cantidad de Agua Leída:</label>
                            <input type="number" name="Cantidad_Agua_Leida" class=" form-control">
                        </div>
    
                         <!-- ... (otros campos existentes) ... -->
    
                                <div class="form-group">
                                    <label for="Consumo_Agua">Consumo de Agua:</label>
                                    <input type="number" name="Consumo_Agua" class="form-control">
                                    <!-- Se establece readonly para mostrar el resultado del cálculo -->
                                </div>
                            
                                <div class="form-group">
                                    <label for="Valor_Cordoba">Valor en Córdoba:</label>
                                    <input type="number" name="Valor_Cordoba" class="form-control">
                                    <!-- Se establece readonly para mostrar el resultado del cálculo -->
                                </div>
    
                                
                        <div class="form-group">
                            <label for="Fecha_Lectura">Fecha de Lectura:</label>
                            <input type="date" name="Fecha_Lectura" class=" form-control" required>
                        </div>
    
                            
                                <div class="form-group">
                                    <label for="Periodo_Del">Periodo Del:</label>
                                    <input type="text" name="Periodo_Del" class="form-control" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="Periodo_Al">Periodo Al:</label>
                                    <input type="text" name="Periodo_Al" class="form-control" required>
                                </div>
                            
                                <div class="form-group">
                                    <label for="Mes_Leido">Mes Leído:</label>
                                    <input type="text" name="Mes_Leido" class="form-control" required>
                                </div>
                               
                                                          
                                <div class="form-group">
                                    <label for="Numero_Recibo">Número de Recibo:</label>
                                    <input type="text" name="Numero_Recibo" class="form-control" required>
                                </div>
                            
                       
                         <button style="background-color: darkblue" class="btn btn-secondary btn-sm" type="submit">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
                {{--  formulario de edicion  --}}
                      <!-- Modal -->
    <div class="modal fade" id="crearLecturaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title" id="exampleModalLabel">editar Nueva Lectura de Medidor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                           {{--Aqui va el formulario--}} 
                                                 
                         <button style="background-color: darkblue" class="btn btn-secondary btn-sm" type="submit">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

            </div>
        </div>
    @stop
    
    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">

        <style></style>
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
                            confirmButtonColor:"info",
                            confirmButtonText: 'Aceptar'
                        })
                    }
                   
                    $(document).ready(function(){
            // Función para calcular el consumo de agua y valor en córdoba al cambiar los valores de lectura
            $('input[name="Lectura_Anterior"], input[name="Lectura_Actual"]').on('input', function(){
                var lecturaAnterior = parseFloat($('input[name="Lectura_Anterior"]').val()) || 0;
                var lecturaActual = parseFloat($('input[name="Lectura_Actual"]').val()) || 0;

                var consumoAgua = lecturaActual - lecturaAnterior;
                var valorCordoba = consumoAgua * 10;

                // Mostrar el resultado en el campo "Consumo de Agua"
                $('input[name="Consumo_Agua"]').val(consumoAgua.toFixed(2));

                // Mostrar el resultado en el campo "Valor en Córdoba"
                $('input[name="Valor_Cordoba"]').val(valorCordoba.toFixed(2));
            });
        });
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
    
        
    @stop
    </section>

