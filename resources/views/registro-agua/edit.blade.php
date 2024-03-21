<!-- resources/views/registro-agua/edit.blade.php -->

{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Registro de Agua</h1>
            </div>
        </div>
    @stop
    
    
     @section('content')
        <div class="card">
            <div class="card-body ">
                
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
   
<!-- Formulario para editar el registro -->
<form action="{{ route('registro-agua.update', $registrosAgua->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="NombreDeUsuario">Nombre de Usuario:</label>
        <select name="user_id" class="form-control" required>
            <option value="">Seleccione un Usuario</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" data-nombre="{{ $user->name }}" {{ $user->id == $registrosAgua->user_id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <!-- Campo oculto para almacenar el nombre del usuario seleccionado -->
        <input type="hidden" name="NombreDeUsuario" id="NombreDeUsuario" value="{{ $registrosAgua->NombreDeUsuario }}">
    </div>
    
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
    
    <div class="form-group">
        <label for="Mes">Mes:</label>
        <select name="Mes" class="form-control" required>
            <option value="">Seleccione un Mes</option>
            @foreach(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $mes)
                <option value="{{ $mes }}" {{ old('Mes', $registrosAgua->Mes) == $mes ? 'selected' : '' }}>{{ $mes }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Año">Lectura Actual:</label>
        <input type="number" name="Año" class="form-control" value="{{ old('Año', $registrosAgua->Año) }}" nullable>
    </div>
    <div class="form-group">
        <label for="LecturaActual">Lectura Actual:</label>
        <input type="number" name="LecturaActual" class="form-control" value="{{ old('LecturaActual', $registrosAgua->LecturaActual) }}" nullable>
    </div>
    <div class="form-group">
        <label for="LecturaAnterior">Lectura Anterior:</label>
        <input type="number" name="LecturaAnterior" class="form-control" value="{{ old('LecturaAnterior', $registrosAgua->LecturaAnterior) }}" nullable>
    </div>
    {{-- <div class="form-group">
        <label for="ConsumoM3">Consumo (M3):</label>
        <input type="number" name="ConsumoM3" class="form-control" value="{{ old('ConsumoM3', $registrosAgua->ConsumoM3) }}" nullable>
    </div> --}}
    <div class="form-group">
        <label for="ConsumoM3">Consumo (M3):</label>
        <input type="number" name="ConsumoM3" class="form-control" value="{{ old('ConsumoM3', $registrosAgua->ConsumoM3) }}" readonly>
    </div>
      <div class="form-group">
        <label for="ValoraMetroCubico">Valor por Metro Cúbico:</label>
        <input type="number" name="ValoraMetroCubico" class="form-control" value="{{ old('ValoraMetroCubico', $registrosAgua->ValoraMetroCubico)}}"nullable readonly>

      </div>
      {{-- nuevos campos --}}
  
      {{-- tomarr --}}
      <div class="form-group">
        <label for="SaldoAnteriorMora">Saldo Anterior por Mora:</label>
        <input type="number" name="SaldoAnteriorMora" class="form-control" value="{{ old('SaldoAnteriorMora', $registrosAgua->SaldoAnteriorMora) }}" required>
    </div>
   {{--  <div class="form-group">
        <label for="TotalPago">Total de Pago:</label>
        <input type="number" name="TotalPago" class="form-control" value="{{ old('TotalPago', $registrosAgua->TotalPago) }}" required>
    </div> --}}
    <div class="form-group">
        <label for="TotalPago">Total de Pago:</label>
        <input type="number" name="TotalPago" class="form-control" value="{{ old('TotalPago', $registrosAgua->TotalPago) }}" readonly>
    </div>
    <div class="form-group">
        <label for="ValorRecibido">Valor Recibido:</label>
        <input type="number" name="ValorRecibido" class="form-control" value="{{ old('ValorRecibido', $registrosAgua->ValorRecibido) }}" required>
    </div>
    <div class="form-group">
        <label for="NumeroRecibo">Número de Recibo:</label>
        <input type="text" name="NumeroRecibo" class="form-control" value="{{ old('NumeroRecibo', $registrosAgua->NumeroRecibo) }}" required>
    </div>
    {{-- <div class="form-group">
        <label for="SaldoActualMora">Saldo Actual por Mora:</label>
        <input type="number" name="SaldoActualMora" class="form-control" value="{{ old('SaldoActualMora', $registrosAgua->SaldoActualMora) }}" required>
    </div> --}}
    <div class="form-group">
        <label for="SaldoActualMora">Saldo Actual por Mora:</label>
        <input type="number" name="SaldoActualMora" class="form-control" value="{{ old('SaldoActualMora', $registrosAgua->SaldoActualMora) }}" readonly>
    </div>
    <div class="form-group">
        <label for="NumeroMedidor">Número de Medidor:</label>
        <input type="text" name="NumeroMedidor" class="form-control" value="{{ old('NumeroMedidor', $registrosAgua->NumeroMedidor) }}" readonly>
    </div>

    
    
         <button type="submit" class="btn btn-primary">Guardar Registro</button>

  </form> 
  <a  class="btn btn-success btn-sm" href="{{ route('registro-agua.index') }}">Volver a la lista de Registros</a>
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
        <script> console.log('Hi!'); </script>

        <!-- ... (código existente) ... -->

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

<!-- ... (código existente) ... -->

    @stop
    </section>

@section('content')
 

@endsection