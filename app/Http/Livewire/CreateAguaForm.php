<?php

namespace App\Http\Livewire;

use App\Models\Medidor;
use App\Models\RegistroAgua;
use App\Models\User;
use Livewire\Component;


class CreateAguaForm extends Component
{
    public $users;
    public $medidores;
    public $user_id; // Corregir el nombre de la propiedad a $user_id
    public $NombreDeUsuario;
    public $Mes;
    public $Año;
    public $LecturaActual;
    public $LecturaAnterior;
    public $ConsumoM3;
    public $ValoraMetroCubico;
    public $SaldoAnteriorMora;
    public $TotalPago;
    public $ValorRecibido;
    public $NumeroRecibo;
    public $SaldoActualMora;
    public $NumeroMedidor;
    public $medidor_id; // Agregar la propiedad para el medidor

    public function render()
    {
        $this->users = User::all();
        $this->medidores = Medidor::all();

        return view('livewire.create-agua-form');
        
    }

    public function calcularOperaciones()
{
    // Verificar si los valores son numéricos antes de realizar las operaciones
    if (
        is_numeric($this->LecturaActual) &&
        is_numeric($this->LecturaAnterior) &&
        is_numeric($this->ValoraMetroCubico) &&
        is_numeric($this->SaldoAnteriorMora) &&
        is_numeric($this->ValorRecibido)
    ) {
        // Lógica de cálculo igual a la que tenías en el formulario original
        $this->ConsumoM3 = $this->LecturaActual - $this->LecturaAnterior;
        $this->TotalPago = ($this->ConsumoM3 * $this->ValoraMetroCubico) + $this->SaldoAnteriorMora;
        $this->SaldoActualMora = $this->TotalPago - $this->ValorRecibido;
    } else {
        // Manejar el caso en el que alguno de los valores no es numérico

        // Establecer valores predeterminados en cero
        $this->ConsumoM3 = 0;
        $this->TotalPago = 0;
        $this->SaldoActualMora = 0;

        // Agregar un mensaje de error
        $this->addError('calculos', 'Alguno de los valores no es numérico. Los cálculos se establecieron en cero.');
    }
}

    public function updated($field)
    {
        // Llama a la función de cálculo cuando los campos relevantes cambian
        if (in_array($field, ['LecturaActual', 'LecturaAnterior', 'ValoraMetroCubico', 'SaldoAnteriorMora', 'ValorRecibido'])) {
            $this->calcularOperaciones();
        }
    }

    public function guardarRegistro()
{
    // Lógica de validación
    $this->validate([
        'user_id' => 'required|exists:users,id',
        'NombreDeUsuario' => 'required|string|max:255',
        'Mes' => 'required|string|max:255',
        'Año' => 'required|numeric|min:0',
        'LecturaActual' => 'nullable|numeric|min:0',
        'LecturaAnterior' => 'nullable|numeric|min:0',
        'ConsumoM3' => 'nullable|numeric|min:0',
        'ValoraMetroCubico' => 'required|numeric|min:0',
        'SaldoAnteriorMora' => 'required|numeric|min:0',
        'TotalPago' => 'required|numeric|min:0',
        'ValorRecibido' => 'required|numeric|min:0',
        'NumeroRecibo' => 'required|string|max:255',
        'SaldoActualMora' => 'required|numeric|min:0',
        
        // ... otras reglas de validación ...
    ]);
        
        // Validar que el medidor no esté asignado a otro usuario
    $medidorAsignado = RegistroAgua::where('NumeroMedidor', $this->NumeroMedidor)
    ->where('user_id', '<>', $this->user_id)
    ->exists();

if ($medidorAsignado) {
    $this->addError('NumeroMedidor', 'El medidor ya está asignado a otro usuario.');
    return;
}

    /**    */
         // Lógica para verificar si ya existe un registro para el usuario, mes y año especificados
        $existingRecord = RegistroAgua::where('user_id', $this->user_id)
        ->where('Mes', $this->Mes)
        ->where('Año', $this->Año)
        ->exists();

    if ($existingRecord) {
       
        session()->flash('error', 'Ya existe un registro para este usuario en el mismo mes y año.');
    return redirect()->route('registro-agua.index');
    }

    // Lógica para almacenar el registro en la base de datos
    RegistroAgua::create([
        'user_id' => $this->user_id,
        'NombreDeUsuario' => $this->NombreDeUsuario,
        'Mes' => $this->Mes,
        'Año' => $this->Año,
        'LecturaActual' => $this->LecturaActual,
        'LecturaAnterior' => $this->LecturaAnterior,
        'ConsumoM3' => $this->ConsumoM3,
        'ValoraMetroCubico' => $this->ValoraMetroCubico,
        'SaldoAnteriorMora' => $this->SaldoAnteriorMora,
        'TotalPago' => $this->TotalPago,
        'ValorRecibido' => $this->ValorRecibido,
        'NumeroRecibo' => $this->NumeroRecibo,
        'SaldoActualMora' => $this->SaldoActualMora,
        'NumeroMedidor' => $this->NumeroMedidor,
        // ... otros campos ...
    ]);

    // Redirigir o emitir un mensaje de éxito si es necesario
    session()->flash('create', 'Registro de agua creado exitosamente.');
    return redirect()->route('registro-agua.index');
    return response()->json(['success' => 'Registro   creado exitosamente.']); 
}
}
