
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ public_path() .('css/app.css') }}" rel="stylesheet">
    <style>
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
 <body>
    
    <h1 class=" text-center text-bg-info  " style="text-align: center">Listado de alertas </h1> <br>
       {{--  <img src="{{ public_path() . '/images/02.jpg' }}" alt="" width="200px" height="200px">
       --}}

    <table class="table table-striped table-responsive table-bordered">
       <thead>
           <tr class=" bg-gradient-dark bg-opacity-75">
               <th>ID</th>
               <th>Tipo de Alerta</th>
               <th>Descripción</th>
               <th>Fecha_Hora_Activacion</th>
               <th>ID del Usuario</th>
               <!-- Otros campos según tu modelo -->
              
           </tr>
       </thead>
     <tbody>
   @foreach ($alertasAutomaticas as $alertaAutomatica)
       <tr>
           <td>{{ $alertaAutomatica->AlertaID }}</td>
           <td>{{ $alertaAutomatica->Tipo_Alerta }}</td>
           <td>{{ $alertaAutomatica->Descripcion }}</td>
           <td>{{ $alertaAutomatica->Fecha_Hora_Activacion }}</td>
           <td>{{ $alertaAutomatica->UsuarioID }}</td>
                
           <!-- Otros campos según tu modelo -->
       
              
       </tr>
   @endforeach
   </tbody>
</table>

 </body>
 </html>
