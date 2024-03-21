<!-- alertas_automaticas/edit.blade.php -->
{{-- @extends('layouts.app') --}}

<section>

    @extends('adminlte::page')
    
    @section('title', 'CAPS GNT')
    
    @section('content_header')
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h1>Editar Alerta Automática</h1>
            </div>
        </div>
    @stop
    
    
    @section('content')
        <div class="card">
            <div class="card-body text-success">
                <form action="{{ route('alertas.update', $alertasAutomaticas) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Campos del formulario con valores actuales según tu modelo -->
                    <div class="form-group">
                        <label for="AlertaID">ID de Alerta:</label>
                        <input type="text" name="AlertaID" class=" form-control"  value="{{ $alertasAutomaticas->AlertaID }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Tipo_Alerta">Tipo de alerta:</label>
                        <input type="text" name="Tipo_Alerta" class=" form-control" value="{{ $alertasAutomaticas->Tipo_Alerta }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="Descripcion">Descripcion:</label>
                         <input type="text" name="Descripcion" class=" form-control" value="{{ $alertasAutomaticas->Descripcion }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="Fecha_Hora_Activacion">Fecha_Hora_Activacion:</label>
                        <input type="date" name="Fecha_Hora_Activacion" class=" form-control" value="{{ $alertasAutomaticas->Fecha_Hora_Activacion }}"  required>
                    </div>

                   
                   
                   


                    
                    <button  class="btn btn-secondary btn-sm" type="submit">Actualizar</button>
                </form>
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
