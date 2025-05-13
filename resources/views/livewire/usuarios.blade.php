<div>
    @section('title', 'Usuarios')
    <div class="container-fluid">
        <div class="row text-center mb-3">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h1 class="display-4">Usuarios</h1>
                <button class="btn btn-primary rounded-circle " data-bs-toggle="modal"
                    data-bs-target="#modalCrearUsuarios">+</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <th colspan="3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control"
                                    placeholder="Buscar..."
                                    wire:model="search">
                                </div>
                            </th>
                            <tr>
                                <th class="text-center">Nombre Completo</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($this->usuarios as $usu)
                                <tr>
                                    <td class="text-center">{{ $usu->name }}</td>
                                    <td class="text-center">{{ $usu->email }}</td>
                                    <td class="d-flex justify-content-center">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-sm btn-success"
                                                wire:click="cargacredenciales({{ $usu->id }})"
                                                data-bs-toggle="modal" data-bs-target="#Modalcontraseña"><i
                                                    class="fas fa-lock"></i></button>
                                            <button type="button" class="btn btn-sm btn-warning"
                                                wire:click="cargausuario({{ $usu }})" data-bs-toggle="modal"
                                                data-bs-target="#Modaleditar"><i class="fas fa-user-edit"></i></button>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                wire:click="$emit('deletePost',{{$usu->id}})"><i
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
                    {{ $this->usuarios->links() }}
                </div>
            </div>
        </div>
        {{-- Modal crear usuarios --}}
        <div class="modal fade" id="modalCrearUsuarios" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Crear Usuarios</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="@error('name') text-danger @enderror">Nombre Completo</label>
                            <input type="text" class="form-control @error('name') text-danger @enderror" wire:model="name">
                            <i class="text-danger">
                                @error('name') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group">
                            <label class="@error('email') text-danger @enderror">Email</label>
                            <input type="text" class="form-control @error('email') text-danger @enderror" wire:model="email">
                            <i class="text-danger">
                                @error('email') {{ $message }} @enderror
                            </i>
                        </div>
                        <div class="form-group">
                            <label class="@error('password') text-danger @enderror">Password</label>
                            <input type="text" class="form-control @error('password') text-danger @enderror" wire:model="password">
                            <i class="text-danger">
                                @error('password') {{ $message }} @enderror
                            </i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" wire:click='crear'>Registrar Usuarios</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Fin modal crear Servicio --}}

        {{--  editar   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modaleditar" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Usuario</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nombre Completo</label>
                                                    <input type="text" class="form-control" wire:model="nombre_completox">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label class="@error('email') text-danger @enderror">Correo</label>
                                                    <input type="email" class="form-control" wire:model="emailx">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label>Rol</label>
                                                    <select class="form-select" wire:model="rolx">
                                                        <option value="">Seleccione una opción...</option>
                                                        <option value="Admon">Administrador</option>
                                                        <option value="Client">Cliente</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label>Estado</label>
                                                    <select class="form-select" wire:model="statusx">
                                                        <option value="">Seleccione una opción...</option>
                                                        <option value="2">Activo</option>
                                                        <option value="1">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipo de Documento</label>
                                                    <select class="form-select" wire:model="tipo_documentox">
                                                        <option value="">Seleccione una opción...</option>
                                                        <option value="Carnet Diplomatico">Carnet Diplomatico</option>
                                                        <option value="Cédula de Ciudadania">Cédula de Ciudadania</option>
                                                        <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                                                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                                        <option value="Pasaporte">Pasaporte</option>
                                                        <option value="Registro Civil">Registro Civil</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>No Documento</label>
                                                    <input type="text" class="form-control" wire:model="no_documentox">
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefono</label>
                                                    <input type="text" class="form-control" wire:model="telefonox">
                                                </div>
                                                <div class="form-group">
                                                    <label>Whatsapp</label>
                                                    <input type="text" class="form-control" wire:model="whatsappx">
                                                </div>
                                                <div class="form-group">
                                                    <label>Direccion</label>
                                                    <textarea class="form-control" wire:model="direccionx" rows="4"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" wire:click="actua">Editar
                                        Usuario</button>
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

        {{--  contraseña   --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="Modalcontraseña" tabindex="-1" wire:ignore.self>
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Editar Contraseña</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        <input type="text" class="form-control" wire:model="passwordy">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{--  <button type="submit" class="btn btn-primary" wire:click="actuacredenciales({{ $usu->id }})">Editar Contraseña</button>  --}}
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  contraseña   --}}

        {{--  modal Direccion   --}}
        <div class="modal fade" id="modal_direccion" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Direccion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{--  <p style="text-align: justify" >{{$descripcion_direccion}}</p>  --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div> 
        {{--  modal Direccion   --}}

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
                    livewire.emitTo('usuarios', 'delete', postId);

                    Swal.fire({
                    title: "!Eliminado!",
                    text: "Se elimino el Usuario",
                    icon: "success"
                    });
                }
            });
        });
    </script>
@endpush
