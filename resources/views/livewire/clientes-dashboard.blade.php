<div>
    @section('title', 'Clientes')
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-4">Clientes</h1>
                <button class="btn btn-primary rounded-circle " data-bs-toggle="modal"
                    data-bs-target="#modalCrearSlug">+</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info d-flex align-items-center" wire:click='export'>
                    <i class="fas fa-file-export me-2"></i> Exportar
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <th colspan="10">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control"
                                    placeholder="Buscar..."
                                    wire:model="search">
                                </div>
                            </th>
                            <tr>
                                <th class="text-center">nombre</th>
                                <th class="text-center">apellido</th>
                                <th class="text-center">cedula</th>
                                <th class="text-center">departamento</th>
                                <th class="text-center">ciudad</th>
                                <th class="text-center">celular</th>
                                <th class="text-center">email</th>
                                <th class="text-center">Fecha Creacion</th>
                                <th class="text-center">Fecha Actualizacion</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->clientes as $cat)
                                <tr>
                                    <td class="text-center">{{ $cat->nombre }}</td>
                                    <td class="text-center">{{ $cat->apellido }}</td>
                                    <td class="text-center">{{ $cat->cedula }}</td>
                                    <td class="text-center">{{ $cat->departamento }}</td>
                                    <td class="text-center">{{ $cat->ciudad }}</td>
                                    <td class="text-center">{{ $cat->celular }}</td>
                                    <td class="text-center">{{ $cat->email }}</td>
                                    <td class="text-center">{{ $cat->created_at }}</td>
                                    <td class="text-center">{{ $cat->updated_at }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-warning"
                                                wire:click="cargaclientes({{ $cat }})" data-bs-toggle="modal"
                                                data-bs-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                wire:click="$emit('deletePost',{{$cat->id}})"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No hay registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $this->clientes->links() }}
                </div>
            </div>
        </div>

        {{-- Modal crear categoria --}}
        <div class="modal fade" id="modalCrearSlug" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Categoria</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="@error('departamento') text-danger @enderror">Departamento</label>
                                        <input type="text" class="form-control @error('departamento') text-danger @enderror" wire:model="departamento">
                                        <i class="text-danger">
                                            @error('departamento') {{ $message }} @enderror
                                        </i>
                                    </div>
                                    <div class="mb-3">
                                        <label class="@error('ciudad') text-danger @enderror">Ciudad</label>
                                        <input type="text" class="form-control @error('ciudad') text-danger @enderror" wire:model="ciudad">
                                        <i class="text-danger">
                                            @error('ciudad') {{ $message }} @enderror
                                        </i>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click='crear'>Registrar Categoria</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin modal crear categoria --}}

        {{--  editar   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modaleditar" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Categoria</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="@error('nombrex') text-danger @enderror">Nombre</label>
                                                    <input type="text" class="form-control @error('nombrex') text-danger @enderror" wire:model="nombrex">
                                                    <i class="text-danger">
                                                        @error('nombrex') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="@error('apellidox') text-danger @enderror">Apellido</label>
                                                    <input type="text" class="form-control @error('apellidox') text-danger @enderror" wire:model="apellidox">
                                                    <i class="text-danger">
                                                        @error('apellidox') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="@error('cedulax') text-danger @enderror">Cedula</label>
                                                    <input type="number" class="form-control @error('cedulax') text-danger @enderror" wire:model="cedulax">
                                                    <i class="text-danger">
                                                        @error('cedulax') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="@error('departamentox') text-danger @enderror">Departamento</label>
                                                    <input type="text" class="form-control @error('departamentox') text-danger @enderror" wire:model="departamentox">
                                                    <i class="text-danger">
                                                        @error('departamentox') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="@error('ciudadx') text-danger @enderror">Ciudad</label>
                                                    <input type="text" class="form-control @error('ciudadx') text-danger @enderror" wire:model="ciudadx">
                                                    <i class="text-danger">
                                                        @error('ciudadx') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="@error('celularx') text-danger @enderror">Celular</label>
                                                    <input type="number" class="form-control @error('celularx') text-danger @enderror" wire:model="celularx">
                                                    <i class="text-danger">
                                                        @error('celularx') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="@error('emailx') text-danger @enderror">Correo electrónico</label>
                                                    <input type="email" class="form-control @error('emailx') text-danger @enderror" wire:model="emailx">
                                                    <i class="text-danger">
                                                        @error('emailx') {{ $message }} @enderror
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actua">Editar
                                        Categoria</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  editar   --}}
    </div>
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
        livewire.on('deletePost', postId => {
            Swal.fire({
                title: "¿Estas Seguro?",
                text: "¿Desea Eliminar este registro?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "SI"
            }).then((result) => {
                if (result.isConfirmed) {
                    livewire.emitTo('clientes-dashboard', 'delete', postId);

                    Swal.fire({
                    title: "!Eliminado!",
                    text: "Se elimino el cliente",
                    icon: "success"
                    });
                }
            });
        });
    </script>
@endpush