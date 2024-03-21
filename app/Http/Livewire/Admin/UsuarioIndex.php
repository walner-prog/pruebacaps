<?php

namespace App\Http\Livewire\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Component;
 // importamos la clase  use Livewire\WithPagination; para usar 
 // la paginacion
 use Livewire\WithPagination;
class UsuarioIndex extends Component
{

    use WithPagination;
      
      protected $paginationTheme = "bootstrap";

      public $search ;

      public function updatingsearch(){
        // con esta linea seseteamos la paginacion
        $this->resetPage();
           
     }


    public function render()
    {
        // En la siguiente linea estoy guardadndo en la variable $user los usuarios creados por el usuario activo 
        // el metodo latest me ordena de manera decendente el registro 
     //  $usuarios = User::where('id', auth()->user()->id)
        $usuarios = User::all();
        //en la siguienrte linea busacamo en la bd  con like y $ buscamos todo aunque 
        
    


        return view('livewire.admin.usuario-index', compact('usuarios'));
    }
}
