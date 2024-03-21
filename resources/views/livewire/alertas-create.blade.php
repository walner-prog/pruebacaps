<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <form wire:submit.prevent="guardarAlerta">
        @csrf

         <!-- Campos del formulario según tu modelo -->
    <div class="form-group">
        <label for="AlertaID">ID de Alerta:</label>
        <input wire:model="AlertaID" type="text" name="AlertaID" class="form-control" placeholder="Este campo no es obligatorio">
    </div>

    <div class="form-group">
        <label for="Tipo_Alerta">Tipo de alerta:</label>
        <input wire:model="Tipo_Alerta" type="text" name="Tipo_Alerta" class="form-control" placeholder="Escriba aquí el tipo de alerta" required>
    </div>

    <div class="form-group">
        <label for="Descripcion">Descripcion:</label>
        <input wire:model="Descripcion" type="text" name="Descripcion" class="form-control" placeholder="Escriba una breve descripcion de la alerta" required>
    </div>

    <div class="form-group">
        <label for="Fecha_Hora_Activacion">Fecha_Hora_Activacion:</label>
        <input wire:model="Fecha_Hora_Activacion" type="date" name="Fecha_Hora_Activacion" class="form-control" placeholder="Ingrese el Id de la alerta" required>
    </div>

    <button type="submit" class="btn btn-secondary btn-sm">Guardar</button>
</form>
<a class="btn btn-success btn-sm justify-content-sm-center" href="{{ route('alertas.index') }}">Volver a la lista de alertas</a>

</div>
