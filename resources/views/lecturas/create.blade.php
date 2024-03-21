<!-- resources/views/lecturas/create.blade.php -->
{{-- @extends('layouts.app') --}}

<section>
    @section('head')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@stop

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Crear Nueva Lectura de Medidor</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">
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
                        <select name="name" class=" form-control" required>
                           @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->name }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="codigo">Codigo:</label>
                        <select name="codigo" class=" form-control" required>
                            @foreach($medidores as $medidor)
                                <option value="{{ $medidor->codigo }}">{{ $medidor->codigo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="UsuarioID">UsuarioID:</label>
                        <select name="UsuarioID" class=" form-control" required>
                           @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->id }}</option>
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
                        
                   
                     <button class="btn btn-secondary btn-sm" type="submit">Guardar</button>
                </form>
                <a class="btn btn-success btn-sm " href="{{ route('lecturas.index') }}">Volver a la lista de lecturas</a>
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
    @section('js')
    @parent
    <script>
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
    </script>
@stop

   
        <script> console.log('Hi!'); </script>
    @stop
    </section>

