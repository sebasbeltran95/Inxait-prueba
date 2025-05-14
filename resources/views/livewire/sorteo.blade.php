<div>
    @section('title', 'Ganador')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                   <img src="{{ asset('img/logo.png') }}" width="20%" alt="User Icon" />
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h3 class="mb-0">🎉 Sorteo de Clientes 🎉</h3>
                    </div>
                    <div class="card-body text-center">
                        <p class="lead">
                            Total de clientes registrados: 
                            <span class="badge bg-info">{{ $totalClientes }}</span>
                        </p>
                        <button 
                            wire:click="seleccionarGanador"
                            class="btn btn-primary mb-3"
                            @if($totalClientes < 5) disabled @endif
                        >
                            Seleccionar ganador
                        </button>
                        @if (session()->has('error'))
                            <div class="alert alert-warning">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if ($ganador)
                            <div class="alert alert-success mt-4">
                                <h4 class="mb-2">🏆 ¡Tenemos un ganador! 🏆</h4>
                                <p><strong>Nombre:</strong> {{ $ganador->nombre }}</p>
                                <p><strong>Email:</strong> {{ $ganador->email }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
