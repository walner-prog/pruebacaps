<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\RegistroAgua;

class SearchRegistrations extends Component
{
    public $searchTerm = '';
    

    
    public function render()

    {
        $registrations = RegistroAgua::where('NombreDeUsuario', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('Mes', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('ConsumoM3', 'like', '%' . $this->searchTerm . '%')
            ->orWhere('SaldoActualMora', 'like', '%' . $this->searchTerm . '%')
            ->get();

            

        return view('livewire.search-registrations', compact('registrations','registrosAgua'));
    }
}


