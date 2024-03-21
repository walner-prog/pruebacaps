<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <!-- resources/views/livewire/registro-agua.blade.php -->

<div>
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <form wire:submit.prevent="guardarRegistro">
        <!-- Mostrar mensajes de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Resto del formulario -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Nombre de Usuario -->
                        <div class="form-group">
                            <label for="NombreDeUsuario">Nombre de Usuario:</label>
                            <select wire:model="user_id" class="form-control" required>
                                <option value="">Seleccione un Usuario</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <!-- Nombre de Usuario -->
                            <div class="form-group">
                                <label for="NombreDeUsuario">Nombre de Usuario:</label>
                                <select wire:model="NombreDeUsuario" class="form-control" required>
                                    <option value="">Seleccione un nombre</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       <div class="col-md-6">
                        <!-- Mes -->
                          <div class="form-group">
                            <label for="Mes">Mes:</label>
                            <select wire:model="Mes" class="form-control" required>
                                <option value="">Seleccione un Mes</option>
                                @foreach(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $mes)
                                    <option value="{{ $mes }}">{{ $mes }}</option>
                                @endforeach
                            </select>
                         </div>
                    </div>
                </div>
  <div class="row">
        <div class="col-md-6">
            <!-- Año -->
            <div class="form-group">
                <label for="Año">Año:</label>
                <input wire:model="Año" type="number" class="form-control">
            </div>
        </div>
    </div>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Lectura Actual -->
                        <div class="form-group">
                            <label for="LecturaActual">Lectura Actual:</label>
                            <input wire:model="LecturaActual" type="number" class="form-control" nullable>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Lectura Anterior -->
                        <div class="form-group">
                            <label for="LecturaAnterior">Lectura Anterior:</label>
                            <input wire:model="LecturaAnterior" type="number" class="form-control" nullable>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Consumo (M3) -->
                        <div class="form-group">
                            <label for="ConsumoM3">Consumo (M3):</label>
                            <input wire:model="ConsumoM3" type="number" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Valor por Metro Cúbico -->
                        <div class="form-group">
                            <label for="ValoraMetroCubico">Valor por Metro Cúbico:</label>
                            <input wire:model="ValoraMetroCubico" type="number"  class="form-control" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Saldo Anterior por Mora -->
                        <div class="form-group">
                            <label for="SaldoAnteriorMora">Saldo Anterior por Mora:</label>
                            <input wire:model="SaldoAnteriorMora" type="number" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <!-- Total de Pago -->
                        <div class="form-group">
                            <label for="TotalPago">Total de Pago:</label>
                            <input wire:model="TotalPago" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Valor Recibido -->
                        <div class="form-group">
                            <label for="ValorRecibido">Valor Recibido:</label>
                            <input wire:model="ValorRecibido" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- Número de Recibo -->
                        <div class="form-group">
                            <label for="NumeroRecibo">Número de Recibo:</label>
                            <input wire:model="NumeroRecibo" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- Saldo Actual por Mora -->
                        <div class="form-group">
                            <label for="SaldoActualMora">Saldo Actual por Mora:</label>
                            <input wire:model="SaldoActualMora" type="number" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <!-- Resto del formulario -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="NumeroMedidor">Nuemro de Medidor:</label>
                            <select wire:model="NumeroMedidor" class="form-control" required>
                                <option value="">Seleccione un Medidor</option>
                                @foreach($medidores as $medidor)
                                    <option value="{{ $medidor->codigo }}">{{ $medidor->codigo }}</option>
                                @endforeach
                            </select>
                
                            @error('NumeroMedidor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- Resto del formulario -->


               
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Guardar Registro</button>
        </div>
    </form>
</div>

@section('js')
    <!-- Script JavaScript para realizar cálculos en tiempo real -->
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('calcularOperaciones', function () {
                var lecturaActual = parseFloat(document.querySelector('input[name="LecturaActual"]').value) || 0;
                var lecturaAnterior = parseFloat(document.querySelector('input[name="LecturaAnterior"]').value) || 0;
                var valoraMetroCubico = parseFloat(document.querySelector('input[name="ValoraMetroCubico"]').value) || 0;
                var saldoAnteriorMora = parseFloat(document.querySelector('input[name="SaldoAnteriorMora"]').value) || 0;
                var valorRecibido = parseFloat(document.querySelector('input[name="ValorRecibido"]').value) || 0;

                // Calcular el ConsumoM3
                var consumoM3 = lecturaActual - lecturaAnterior;
                document.querySelector('input[name="ConsumoM3"]').value = consumoM3;

                // Calcular el TotalPago
                var totalPago = (consumoM3 * valoraMetroCubico) + saldoAnteriorMora;
                document.querySelector('input[name="TotalPago"]').value = totalPago;

                // Calcular el SaldoActualMora
                var saldoActualMora = totalPago - valorRecibido;
                document.querySelector('input[name="SaldoActualMora"]').value = saldoActualMora;
            });
        });
    </script>
@endsection

</div>
