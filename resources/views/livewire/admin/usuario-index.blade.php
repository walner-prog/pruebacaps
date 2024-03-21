


<div>
    {{-- The Master doesn't talk, he acts. --}}
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
        <head>
    <!-- Otros elementos del encabezado... -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   </head>

    @if (session('info'))
    <div class="alert alert-success">
       <strong>{{ session('info') }}</strong>
   </div>
    @endif

    
    @if (session('update'))
    <div class="alert alert-warning">
       <strong>{{ session('update') }}</strong>
   </div>
    @endif

    @if (session('delete'))
    <div class="alert alert-danger">
       <strong>{{ session('delete') }}</strong>
   </div>
    @endif

            <div class="card ">
            {{-- {{ $search  }}    --}}
            <div class="card-header">
             <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un usuario"  name="" id="">
            </div>
            <div class="card-header">
            
                <!-- Botón para abrir el modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#crearUsuarioModal">
                  <i class="fas fa-plus-circle mr-2"></i>Crear Nuevo Usuario
                </button>
          </div>
           
         <div class="card card-body text-bg-info ">

             <table class="table table-striped float-lg-right table-responsive table-bordered">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Dirección</th>
                        {{--     <th>Datos de Contacto</th> --}}
                        
                          <th colspan="3">Acciones</th>
                      </tr>
                      
                  </thead>
                 
                  <tbody>
                      @foreach($usuarios as $usuario)
                          <tr>
                              <td>{{ $usuario->id }}</td>
                              <td>{{ $usuario->name }}</td>
                              <td>{{ $usuario->email }}</td>
                             {{--  <td>{{ $usuario->Direccion }}</td>    --}}
                              <td>{{ $usuario->Contacto }}</td>
                              <td>
                               <td width="5px">
                                      <a class="btn btn-primary btn-sm" href="{{ route('usuarios.show', $usuario->id) }}"><i class="fas fa-eye"></i></a>
                               </td>
                               <td width="5px">
                                  <a class="btn btn-warning btn-sm"  href="{{ route('usuarios.edit', $usuario->id) }}"><i class="fas fa-pencil-alt"></i></a>
                              </td>
                                <td width="5px">
                                  <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                   </form>
                                 </td>
                              
      
                          </tr>
                      @endforeach
                  </tbody>

                   
              </table>
                             
                
    </div>
   
    
  
                       <!-- Modal para crear nuevo usuario -->
    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-side modal-top-right" role="document">
            <div class="modal-content">
            <div class="modal-header">
                   <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button>
     </div>
        <div class="modal-body">
            <!-- Formulario de creación de usuario -->
            
            <form action="{{ route('usuarios.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label  class="form-label"  for="name">Nombre:</label>
                <input type="text" name="name" class="form-control"  required>
              </div>
             

              <div class="form-group">
                <label for="Direccion">Dirección:</label>
              <input type="text" name="Direccion" class="form-control"  required>
              </div>
              
              <div class="form-group">
                <label for="email">Email:</label>
              <input type="email" name="email" class="form-control"  required>
              </div>

              
              <div class="form-group">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              </div>
             

                 
                    <div>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>

               <div class="form-group">
                <label for="Contacto">Datos de Contacto:</label>
                <input type="text" name="Contacto" class="form-control"  required>
               </div>
            
              <button class="btn btn-primary btn-block mb-4 " type="submit" >Guardar</button>
          </form>
         
        </div>
        
    
       </div>
      </div>


   

      </div>

      </div>
      
         <body>
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
                   document.addEventListener('DOMContentLoaded', function () {
                            // Función para mostrar SweetAlert en la creación de lecturas
       function showAlert(message, icon, type) {
           Swal.fire({
               title: message,
               icon: icon,
               showCancelButton: false,
               confirmButtonColor: 'info',
               confirmButtonText: 'Aceptar'
           })
       }
                
              // Verifica si hay mensajes de sesión (éxito)
       @if(session('info'))
           showAlert('{{ session('info') }}', 'success', 'success');
       @endif
                
       // Verifica si hay mensajes de sesión (actualización)
       @if(session('update'))
           showAlert('{{ session('update') }}', 'info', 'info');
       @endif
                
       // Verifica si hay mensajes de sesión (eliminación)
       @if(session('delete'))
           showAlert('{{ session('delete') }}', 'error', 'error');
       @endif
           });
           </script>
         </body>
</div>
