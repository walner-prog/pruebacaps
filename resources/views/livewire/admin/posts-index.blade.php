<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

      {{--Encerramos en una condicional 
        de if los card body y card footer para poner un mensaje sino 
        existen registros en la bd--}}
  
   <div class="card">
    {{-- {{ $search  }}    --}}
    <div class="card-header">
     <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post"  name="" id="">
    </div>
    @if ($posts->count())
   <div class="card-body text-bg-info">
        <table class="table table-striped">
           <thead>
             <tr>
               <th>ID</th>
               <th>NAME</th>
               <th colspan="2"></th>
             </tr>
           </thead>

           <tbody>
               @foreach ($posts as $post)
                     <tr>
                         <td>{{ $post->id }}</td>
                         <td>{{ $post->name }}</td>
                         <td width="10px">
                             <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                         </td>
                         <td width="10px">
                              <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                             </form>
                         </td>
                     </tr>
                   
               @endforeach
           </tbody>
        </table>
    </div>
  </div>
       <div class="card-footer">
          {{ $posts->links() }}

        </div>
     
          
   @else
         <div class="card-body">
            <strong>No hay ningun registro</strong> 
        </div> 
      
   @endif
</div>
