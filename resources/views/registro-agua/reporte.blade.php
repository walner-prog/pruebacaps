

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

  
</head>
<body>
     
    <style>
        table{
            text-align-last: center;
        }
        thead{
            border: 4px;
            border-color: darkblue;
            border-radius: 10px;
        }
        .bg-gradient-dark{
            background-color:rgb(88, 86, 86);
            color: white;
        }
        th{
            margin-right: 10px;
            margin-left: 10px
        }
        td{
            border-color: rgb(78, 224, 149);
            background-color:rgb(36, 188, 205);
        }
    </style>
         <h1 class=" text-center  " style="text-align: center">Listado de de registro </h1> <br>
    <table class="table table-striped table-bordered table-responsive  ">
        <!-- Encabezado de la tabla -->
        <!-- ... -->
        <thead class="position-sticky" >
            <tr  class=" bg-gradient-dark bg-opacity-75 position-sticky  ">
             <th>ID</th>
             <th>Nombre de Usuario</th>
             <th>Mes</th>
             <th>Año</th>
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
          
             </tr>
           </thead>
        <!-- Cuerpo de la tabla -->
        <tbody>
  
          @if($registrosAgua->count() > 0)
            @foreach($registrosAgua as $registroAgua)
                <tr>
                   
                    <td>{{ $registroAgua->user_id }}</td>
                    <td>{{ $registroAgua->NombreDeUsuario }}</td>
                    <td>{{ $registroAgua->Mes }}</td>
                    <td>{{ $registroAgua->Año }}</td>
                    <td>{{ $registroAgua->LecturaActual }}</td>
                    <td>{{ $registroAgua->LecturaAnterior }}</td>
                    <td>{{ $registroAgua->ConsumoM3 }}</td>
                    <td>${{ $registroAgua->ValoraMetroCubico }}</td>
                    <td>${{ $registroAgua->SaldoAnteriorMora }}</td>
                    <td>${{ $registroAgua->TotalPago }}</td>
                    <td>${{ $registroAgua->ValorRecibido }}</td>
                    <td>{{ $registroAgua->NumeroRecibo }}</td>
                    <td>{{ $registroAgua->SaldoActualMora }}</td>
                    <td>{{ $registroAgua->NumeroMedidor }}</td>
  
                  
  
                </tr>
               
            @endforeach
            @else
              <tr>
                  <td colspan="16" class="text-center">No se encontraron registros que coincidan con la búsqueda.</td>
              </tr>
              @endif
        </tbody>
        
      </div>
    </table>
</body>
</html>