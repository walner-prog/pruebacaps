<!-- resources/views/facturas/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Factura</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
               
         <form action="{{ route('facturas.update', $factura) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                 <label for="ClienteID">Cliente:</label>
                 <select name="ClienteID" class=" form-control" required>
                  @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $factura->ClienteID == $cliente->id ? 'selected' : '' }}>{{ $cliente->name }}</option>
                  @endforeach
                 </select>
              </div>

             <div class="form-group">
                  <label for="FechaDeEmision">Fecha de Emisión:</label>
                  <input type="date" name="FechaDeEmision" class=" form-control"  value="{{ $factura->FechaDeEmision }}" required readonly>
             </div>

             <div class="form-group">
                <label for="Monto">Monto:</label>
                <input type="text" name="Monto" class=" form-control"  value="{{ $factura->Monto }}" required>
             </div>
             <div class="form-group">
                <label for="Estado_Pago">Estado de Pago:</label>
                <input type="text" name="Estado_Pago" class=" form-control"  value="{{ $factura->Estado_Pago }}" required>
             </div>

                <button class="btn btn-secondary btn-sm"  type="submit">Guardar cambios</button>
    </form>
                <a class="btn btn-success btn-sm"  href="{{ route('facturas.index') }}">Volver a la lista de facturas</a>
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

@section('content')
 
@endsection
