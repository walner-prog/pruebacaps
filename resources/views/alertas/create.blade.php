<!-- alertas_automaticas/create.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    <head>
        
    <!-- Incluir jQuery desde CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Incluir Bootstrap desde CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Crear Nueva Alerta Automática</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body ">


                @livewire('alertas-create')


{{-- 
                <form action=" {{ route('alertas.store') }}" method="POST" id="formulario-alerta">
                    @csrf

                    <!-- Campos del formulario según tu modelo -->
                    <div class="form-group">
                        <label for="AlertaID">ID de Alerta:</label>
                        <input type="text" name="AlertaID" class=" form-control " placeholder="Este campo no es obligatorio" >
                    </div>

                    <div class="form-group">
                        <label for="Tipo_Alerta">Tipo de alerta:</label>
                         <input type="text" name="Tipo_Alerta"  class=" form-control"  placeholder="Escriba aqui el tipo de alerta" required>
                    </div>

                    <div class="form-group">
                        <label for="Descripcion">Descripcion:</label>
                        <input type="text" name="Descripcion"  class=" form-control"  placeholder="Escriba una breve descripcion de la alerta" required>
                    </div>

                    <div class="form-group">
                        <label for="Fecha_Hora_Activacion">Fecha_Hora_Activacion:</label>
                        <input type="date" name="Fecha_Hora_Activacion"  class=" form-control"  placeholder="Ingrese el Id de la alerta" required>
                    </div>
                  <button  class="btn btn-secondary btn-sm" type="submit">Guardar</button>
                </form>
                <a class="btn btn-success btn-sm justify-content-sm-center" href="{{ route('alertas.index') }}">Volver a la lista de alertas</a> --}}
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
  {{--   <script>
        $(document).ready(function() {
            // Escuchar el clic en el botón Guardar
            $('#btn-guardar').on('click', function() {
                // Obtener los datos del formulario
                var formData = $('#formulario-alerta').serialize();

                // Realizar la solicitud AJAX
                $.ajax({
                    type: 'POST',
                    url: $('#formulario-alerta').attr('action'),
                    data: formData,
                    success: function(response) {
                        // Manejar la respuesta del servidor (opcional)
                        console.log(response);

                        // Puedes realizar acciones adicionales aquí si es necesario

                        // Limpiar el formulario si la solicitud fue exitosa
                        $('#formulario-alerta')[0].reset();
                    },
                    error: function(error) {
                        // Manejar errores si es necesario
                        console.error(error);
                    }
                });
            });
        });
    </script> --}}
@stop

        <script> console.log('Hi!'); </script>
    @stop
    </section>

