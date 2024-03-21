<?php


namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AlertasAutomaticas; // Asegúrate de importar tu modelo Alerta

class AlertasCreate extends Component
{
    public $AlertaID;
    public $Tipo_Alerta;
    public $Descripcion;
    public $Fecha_Hora_Activacion;

    public function render()
    {
        return view('livewire.alertas-create');
    }

    public function guardarAlerta()
    {
        // Valida y guarda los datos en tu controlador o servicio correspondiente
        AlertasAutomaticas::create([
            'AlertaID' => $this->AlertaID,
            'Tipo_Alerta' => $this->Tipo_Alerta,
            'Descripcion' => $this->Descripcion,
            'Fecha_Hora_Activacion' => $this->Fecha_Hora_Activacion,
        ]);

        // Limpiar los campos después de guardar
        $this->reset();

        return redirect()->route('alertas.index');
    }
}

