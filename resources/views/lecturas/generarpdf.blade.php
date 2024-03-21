<div>
  
  <?
    header("Content-Tipe: application/vnd.ms-excel; charset=iso-8859-1");
    header("Content-Disposition: attachment; filemane=Lecturas-usuario.xls");
  ?>
    
    <table class="table table-striped table-responsive table-bordered">
        <caption>Datos de lecturas</caption>
        <thead>
            <tr>
                <th>LecturaID</th>
                <th>MedidorID</th>
                <th>UsuarioID</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Lectura Actual</th>
                <th>Lectura Anterior</th>
                <th>Consumo Agua</th>
                <th>Valor Cordoba</th>
                <th>Periodo Del</th>
                <th>Periodo Al</th>
                <th>  Mes Leido</th>
                <th>Numero de recibo</th> 
                <th>Fecha de Lectura</th>
                <th>Cantidad de Agua Leída</th>
              

                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lecturas as $lectura)
                <tr>

                    <td>{{ $lectura->MedidorID }}</td>
                    <td>{{ $lectura->LecturaID }}</td>
                  
                    <td>{{ $lectura->UsuarioID }}</td>
                    <td>{{ $lectura->name }}</td>
                    <td>{{ $lectura->codigo }}</td>
                    <td>{{ $lectura->Lectura_Actual }}</td>
                    <td>{{ $lectura->Lectura_Anterior }}</td>
                    <td>{{ $lectura->Consumo_Agua }}</td>
                    <td>{{ $lectura->Valor_Cordoba }}</td>
                    <td>{{ $lectura->Periodo_Del }}</td>
                    <td>{{ $lectura->Periodo_Al }}</td>
                    <td>{{ $lectura->Mes_Leido }}</td>
                    <td>{{ $lectura->Numero_Recibo }}</td>
                
                   
                    <td>{{ $lectura->Fecha_Lectura }}</td>
                    <td>{{ $lectura->Cantidad_Agua_Leida }}</td>
                    
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
</div>