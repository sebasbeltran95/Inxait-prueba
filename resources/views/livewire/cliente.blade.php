<div>
    @section('title', 'Formulario')
    <header class="text-center">
        <div class="container">
            <img src="{{ asset('img/logo.png') }}" width="10%" alt="User Icon" />
        <h1 class="display-4">AutoDrive</h1>
        <p class="lead">Solicita una cotización para tu próximo auto hoy mismo</p>
        </div>
    </header>

    <section class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Llena el formulario de registro</h5>
                        <div class="mb-3">
                            <label class="@error('nombre') text-danger @enderror">Nombre</label>
                            <input type="text" class="form-control @error('nombre') text-danger @enderror" wire:model="nombre">
                            <i class="text-danger">
                                @error('nombre') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="mb-3">
                            <label class="@error('apellido') text-danger @enderror">Apellido</label>
                            <input type="text" class="form-control @error('apellido') text-danger @enderror" wire:model="apellido">
                            <i class="text-danger">
                                @error('apellido') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="mb-3">
                            <label class="@error('cedula') text-danger @enderror">Cedula</label>
                            <input type="number" class="form-control @error('cedula') text-danger @enderror" wire:model="cedula">
                            <i class="text-danger">
                                @error('cedula') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="mb-3">
                            <label class="@error('departamento') text-danger @enderror">Departamento</label>
                            <select class="form-select @error('departamento') is-invalid @enderror" wire:model="departamento">
                                <option value="">Seleccione un departamento</option>
                                @foreach(array_keys($departamentos) as $dep)
                                    <option value="{{ $dep }}">{{ $dep }}</option>
                                @endforeach
                            </select>
                            <i class="text-danger">@error('departamento') {{ $message }} @enderror</i>
                        </div>
                        <div class="mb-3">
                            <label class="@error('ciudad') text-danger @enderror">Ciudad</label>
                            <select class="form-select @error('ciudad') is-invalid @enderror" wire:model="ciudad" @if(empty($ciudadesDisponibles)) disabled @endif>
                                <option value="">Seleccione una ciudad</option>
                                @foreach($ciudadesDisponibles as $ciu)
                                    <option value="{{ $ciu }}">{{ $ciu }}</option>
                                @endforeach
                            </select>
                            <i class="text-danger">@error('ciudad') {{ $message }} @enderror</i>
                        </div>
                        <div class="mb-3">
                            <label class="@error('celular') text-danger @enderror">Celular</label>
                            <input type="number" class="form-control @error('celular') text-danger @enderror" wire:model="celular">
                            <i class="text-danger">
                                @error('celular') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="mb-3">
                            <label class="@error('email') text-danger @enderror">Correo electrónico</label>
                            <input type="email" class="form-control @error('email') text-danger @enderror" wire:model="email">
                            <i class="text-danger">
                                @error('email') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-check mb-3">
                            <input
                                class="form-check-input @error('habeas_data') text-danger @enderror"
                                type="checkbox"
                                id="habeasData"
                                wire:model="habeas_data">
                            <label class="form-check-label @error('habeas_data') text-danger @enderror" for="habeasData">
                                Acepto el Habeas Data
                            </label>
                            <br>
                            <i class="text-danger">
                                @error('habeas_data') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" wire:click='crear'>Solicitar cotización</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@push('js')
    <script>
        Livewire.on('ok', msj =>{
            Swal.fire(
                msj[0],
                msj[1],
                msj[2],
            )
        });
    </script>
@endpush