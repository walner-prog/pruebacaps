<!-- resources/views/registro-agua/create.blade.php -->

@extends('adminlte::page')

@section('title', 'CAPS GNT')

@section('content_header')
    <div class="card bg-primary text-white">
        <div class="card-header">
            <h1>Crear Nuevo Registro de Agua</h1>
        </div>
    </div>
@stop

@section('content')
            @livewire('create-agua-form')



   {{--  <div class="card">
        <div class="card-body">
            
            <!-- Mostrar mensajes de validación -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Formulario para crear un nuevo registro -->
            <form action="{{ route('registro-agua.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <!-- Nombre de Usuario -->
                        <div class="form-group">
                            <label for="NombreDeUsuario">Nombre de Usuario:</label>
                            <select name="user_id" class="form-control" required>
                                <option value="">Seleccione un Usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" data-nombre="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <!-- Campo oculto para almacenar el nombre del usuario seleccionado -->
                            <input type="hidden" name="NombreDeUsuario" id="NombreDeUsuario" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Mes -->
                        <div class="form-group">
                            <label for="Mes">Mes:</label>
                            <select name="Mes" class="form-control" required>
                                <option value="">Seleccione un Mes</option>
                                @foreach(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $mes)
                                    <option value="{{ $mes }}" {{ old('Mes') == $mes ? 'selected' : '' }}>{{ $mes }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <!-- Lectura Actual -->
                        <div class="form-group">
                            <label for="LecturaActual">Lectura Actual:</label>
                            <input type="number" name="LecturaActual" class="form-control" value="{{ old('LecturaActual') }}" nullable>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Lectura Anterior -->
                        <div class="form-group">
                            <label for="LecturaAnterior">Lectura Anterior:</label>
                            <input type="number" name="LecturaAnterior" class="form-control" value="{{ old('LecturaAnterior') }}" nullable>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Consumo (M3) -->
                        <div class="form-group">
                            <label for="ConsumoM3">Consumo (M3):</label>
                            <input type="number" name="ConsumoM3" class="form-control" value="{{ old('ConsumoM3') }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Valor por Metro Cúbico -->
                        <div class="form-group">
                            <label for="ValoraMetroCubico">Valor por Metro Cúbico:</label>
                            <input type="number" name="ValoraMetroCubico" class="form-control" value="{{ old('ValoraMetroCubico') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Saldo Anterior por Mora -->
                        <div class="form-group">
                            <label for="SaldoAnteriorMora">Saldo Anterior por Mora:</label>
                            <input type="number" name="SaldoAnteriorMora" class="form-control" value="{{ old('SaldoAnteriorMora') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <!-- Total de Pago -->
                        <div class="form-group">
                            <label for="TotalPago">Total de Pago:</label>
                            <input type="number" name="TotalPago" class="form-control" value="{{ old('TotalPago') }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Valor Recibido -->
                        <div class="form-group">
                            <label for="ValorRecibido">Valor Recibido:</label>
                            <input type="number" name="ValorRecibido" class="form-control" value="{{ old('ValorRecibido') }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Número de Recibo -->
                        <div class="form-group">
                            <label for="NumeroRecibo">Número de Recibo:</label>
                            <input type="text" name="NumeroRecibo" class="form-control" value="{{ old('NumeroRecibo') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Saldo Actual por Mora -->
                        <div class="form-group">
                            <label for="SaldoActualMora">Saldo Actual por Mora:</label>
                            <input type="number" name="SaldoActualMora" class="form-control" value="{{ old('SaldoActualMora') }}" readonly>
                        </div>
                    </div>
                    

               
                
               
                <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                        <label for="medidor_id">Medidor:</label>
                        <select name="medidor_id" id="medidor_id" class="form-control" required>
                         <option value="">Seleccione un Medidor</option>
                         <!-- Aquí deberías tener un array de medidores disponibles relacionados con el usuario seleccionado -->
                         <!-- Este array deberías pasarlo desde el controlador al renderizar el formulario -->
                         @foreach($medidores as $medidor)
                             <option value="{{ $medidor->id }}">{{ $medidor->descripcion }}</option>
                         @endforeach
                         </select>
                         <input type="hidden" name="MedidorDescripcion" id="MedidorDescripcion" value="">
                       </div>
                  </div>
                </div> 
             <div class="row">
                 <div class="col-md-12">
                    <div class="form-group">
                     <label for="codigo">Medidor:</label>
                     <select name="codigo" id="codigo" class="form-control" required>
                      <option value="">codigo de  Medidor</option>
                      <!-- Aquí deberías tener un array de medidores disponibles relacionados con el usuario seleccionado -->
                      <!-- Este array deberías pasarlo desde el controlador al renderizar el formulario -->
                      @foreach($medidores as $medidor)
                          <option value="{{ $medidor->id }}">{{ $medidor->codigo }}</option>
                      @endforeach
                      </select>
                      <input type="hidden" name="MedidorDescripcion" id="MedidorDescripcion" value="">
                    </div>
             
                </div>
                
         </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Guardar Registro</button>
            </form>
        </div>
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')

   
    <!-- Script JavaScript para actualizar el campo oculto -->
    <script>
        // Obtener el elemento select
        var selectUsuario = document.querySelector('select[name="user_id"]');
    
        // Escuchar cambios en el select
        selectUsuario.addEventListener('change', function () {
            // Obtener el nombre del usuario seleccionado
            var nombreUsuario = selectUsuario.options[selectUsuario.selectedIndex].getAttribute('data-nombre');
            
            // Actualizar el valor del campo oculto
            document.getElementById('NombreDeUsuario').value = nombreUsuario;
        });
    </script>

    <script>
        // Función para realizar los cálculos
        function calcularOperaciones() {
            var lecturaActual = parseFloat(document.querySelector('input[name="LecturaActual"]').value) || 0;
            var lecturaAnterior = parseFloat(document.querySelector('input[name="LecturaAnterior"]').value) || 0;
            var valoraMetroCubico = parseFloat(document.querySelector('input[name="ValoraMetroCubico"]').value) || 0;
            var saldoAnteriorMora = parseFloat(document.querySelector('input[name="SaldoAnteriorMora"]').value) || 0;
            var valorRecibido = parseFloat(document.querySelector('input[name="ValorRecibido"]').value) || 0;

            // Calcular el ConsumoM3
            var consumoM3 = lecturaActual - lecturaAnterior;
            document.querySelector('input[name="ConsumoM3"]').value = consumoM3;

            // Calcular el TotalPago
            var totalPago = (consumoM3 * valoraMetroCubico) + saldoAnteriorMora;
            document.querySelector('input[name="TotalPago"]').value = totalPago;

            // Calcular el SaldoActualMora
            var saldoActualMora = totalPago - valorRecibido;
            document.querySelector('input[name="SaldoActualMora"]').value = saldoActualMora;
        }

        // Escuchar cambios en los campos relevantes
        document.addEventListener('input', function (event) {
            if (event.target.matches('input[name="LecturaActual"], input[name="LecturaAnterior"], input[name="ValoraMetroCubico"], input[name="SaldoAnteriorMora"], input[name="ValorRecibido"]')) {
                calcularOperaciones();
            }
        });

        // Calcular operaciones al cargar la página
        window.addEventListener('DOMContentLoaded', function () {
            calcularOperaciones();
        });
    </script>
@stop
