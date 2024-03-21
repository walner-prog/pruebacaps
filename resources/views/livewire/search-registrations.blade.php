<div>
    {{--  --}}

   
          
        <div>
            <input type="text" wire:model="searchTerm" placeholder="Buscar por nombre, mes, consumo, saldo...">
            <table class="table table-bordered table-responsive">
                <!-- Encabezado de la tabla -->
                <!-- ... -->
                <thead>
                    <tr>
                     <th>ID</th>
                     <th>Nombre de Usuario</th>
                     <th>Mes</th>
                     <th>Lectura Actual</th>
                     <th>Lectura Anterior</th>
                     <th>Consumo (M3)</th>
                     <th>Valor por Metro Cúbico</th>
                     <th>Saldo Anterior por Mora</th>
                     <th>Total de Pago</th>
                     <th>Valor Recibido</th>
                      <th>Número de Recibo</th>    
                     <th>Saldo Actual por Mora</th>
                     <th>Número de Medidor</th>
                     <th colspan="3">Acciones</th>
                     </tr>
                   </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    @foreach($registrations as $registration)
                        <tr>
                           
                            <td>{{ $registration->user_id }}</td>
                            <td>{{ $registration->NombreDeUsuario }}</td>
                            <td>{{ $registration->Mes }}</td>
                           
                            <td>{{ $registration->LecturaActual }}</td>
                            <td>{{ $registration->LecturaAnterior }}</td>
                            <td>{{ $registration->ConsumoM3 }}</td>
                            <td>{{ $registration->ValoraMetroCubico }}</td>
                            <td>{{ $registration->SaldoAnteriorMora }}</td>
                            <td>{{ $registration->TotalPago }}</td>
                            <td>{{ $registration->ValorRecibido }}</td>
                            <td>{{ $registration->NumeroRecibo }}</td>
                            <td>{{ $registration->SaldoActualMora }}</td>
                            <td>{{ $registration->NumeroMedidor }}</td>

                            <!-- ... otras columnas ... -->
                            <th colspan="3">Acciones</th>

                            <td> <a href="{{ route('registro-agua.show', $registrations->id) }}" class="btn btn-info">Ver</a></td>
                            <td><a href="{{ route('registro-agua.edit', $registrations->id) }}" class="btn btn-warning">Editar</a></td>
                            <td><form action="{{ route('registro-agua.destroy', $registrations->id) }}" method="POST" style="display:inline;">
                               @csrf
                               @method('DELETE')
                               <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</button>
                           </form>
                       </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        
</div>
