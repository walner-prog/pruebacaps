<!-- resources/views/lecturas/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Lectura de Medidor</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
               
   <!-- ... (código existente) ... -->

<form action="{{ route('lecturas.update', $lectura) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="medidor_id">Medidor:</label>
        <select name="medidor_id" class="form-control" required>
            @foreach($medidores as $medidor)
                <option value="{{ $medidor->id }}" {{ $lectura->MedidorID == $medidor->id ? 'selected' : '' }}>{{ $medidor->id }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="UsuarioID">Usuario:</label>
        <select name="UsuarioID" class="form-control" required>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $lectura->UsuarioID == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Fecha_Lectura">Fecha de Lectura:</label>
        <input type="date" name="Fecha_Lectura" class="form-control" value="{{ $lectura->Fecha_Lectura }}" required>
    </div>

    <div class="form-group">
        <label for="Cantidad_Agua_Leida">Cantidad de Agua Leída:</label>
        <input type="text" name="Cantidad_Agua_Leida" class="form-control" value="{{ $lectura->Cantidad_Agua_Leida }}" required>
    </div>

    <!-- Aquí empiezan los campos nuevos -->

    <div class="form-group">
        <label for="Lectura_Actual">Lectura Actual:</label>
        <input type="number" name="Lectura_Actual" class="form-control" value="{{ $lectura->Lectura_Actual }}" required>
    </div>

    <div class="form-group">
        <label for="Lectura_Anterior">Lectura Anterior:</label>
        <input type="number" name="Lectura_Anterior" class="form-control" value="{{ $lectura->Lectura_Anterior }}" required>
    </div>

    <div class="form-group">
        <label for="Consumo_Agua">Consumo de Agua:</label>
        <input type="number" name="Consumo_Agua" class="form-control" value="{{ $lectura->Consumo_Agua }}" readonly>
        <!-- Se establece readonly para mostrar el resultado del cálculo -->
    </div>

    <div class="form-group">
        <label for="Valor_Cordoba">Valor en Córdoba:</label>
        <input type="number" name="Valor_Cordoba" class="form-control" value="{{ $lectura->Valor_Cordoba }}" readonly>
        <!-- Se establece readonly para mostrar el resultado del cálculo -->
    </div>

    <div class="form-group">
        <label for="Periodo_Del">Periodo Del:</label>
        <input type="text" name="Periodo_Del" class="form-control" value="{{ $lectura->Periodo_Del }}" required>
    </div>

    <div class="form-group">
        <label for="Periodo_Al">Periodo Al:</label>
        <input type="text" name="Periodo_Al" class="form-control" value="{{ $lectura->Periodo_Al }}" required>
    </div>

    <div class="form-group">
        <label for="Mes_Leido">Mes Leído:</label>
        <input type="text" name="Mes_Leido" class="form-control" value="{{ $lectura->Mes_Leido }}" required>
    </div>

    <div class="form-group">
        <label for="Numero_Recibo">Número de Recibo:</label>
        <input type="text" name="Numero_Recibo" class="form-control" value="{{ $lectura->Numero_Recibo }}" required>
    </div>

    <!-- ... (otros campos nuevos) ... -->

    <!-- Campos nuevos terminan aquí -->

    <div class="form-group">
        <!-- Otros campos existentes y botones del formulario -->
    </div>

    <button class="btn btn-secondary btn-sm" type="submit">Guardar cambios</button>
</form>

<!-- ... (código existente) ... -->

               <a  class="btn btn-success btn-sm" href="{{ route('lecturas.index') }}">Volver a la lista de lecturas</a>

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


    
