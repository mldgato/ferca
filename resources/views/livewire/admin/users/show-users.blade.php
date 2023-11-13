<div wire:init="loadUsers">
    @include('livewire.admin.users.update-user')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end">
                        @livewire('admin.users.create-user')
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-3 mb-2">
                    <div class="d-flex align-items-center">
                        <span><strong>Mostrar</strong></span>
                        <span class="ml-2">
                            <select wire:model="cant" class="form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </span>
                        <span class="ml-2"><strong>registros</strong></span>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input wire:model="search" id="searcher" type="text" class="form-control"
                            placeholder="Escriba para buscar" autofocus="autofocus" />
                    </div>
                </div>
            </div>
        </div>
        @if (count($users))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="cursor: pointer" wire:click="order('name')">
                                    Nombre
                                    @if ($sort == 'name')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th style="cursor: pointer" wire:click="order('email')">
                                    Email
                                    @if ($sort == 'email')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <button wire:click="edit({{ $user->id }})" data-toggle="modal"
                                            data-target="#UpdateUserData" class="btn btn-success btn-sm mr-2"
                                            title="Editar"><i class="fas fa-edit fa-fw"></i></button>

                                        <button wire:click="edit({{ $user->id }})" data-toggle="modal"
                                            data-target="#UpdateUserPass" class="btn btn-primary btn-sm mr-2"
                                            title="Editar"><i class="fas fa-lock"></i></button>

                                        <button wire:click="edit({{ $user->id }})" data-toggle="modal"
                                            data-target="#UpdateUserRole" class="btn btn-warning btn-sm mr-2"
                                            title="Editar"><i class="fas fa-user-tag"></i></button>

                                        @if (auth()->id() === $user->id)
                                            <button class="btn btn-danger btn-sm" disabled><i
                                                    class="fas fa-trash-alt"></i></button>
                                        @else
                                            <a class="btn btn-danger btn-sm"
                                                wire:click="$emit('deleteUser', {{ $user->id }}, '{{ $user->name }}')"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @if ($users->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-end">{{ $users->links() }}</div>
                </div>
            @endif
        @else
            <div class="card-body">
                <strong class="text-danger">No se han encontrado registros...</strong>
            </div>
        @endif
    </div>
    @section('js')
        <script type="text/javascript">
            Livewire.on('closeModalMessaje', (title, message, type, mymodal) => {
                if (mymodal != 'null') {
                    $('#' + mymodal).modal('hide');
                }
                Swal.fire({
                    position: 'top-end',
                    icon: type,
                    title: title,
                    text: message,
                    showConfirmButton: false,
                    timer: 3000
                });
            });

            Livewire.on('deleteUser', (UserId, ProductName) => {
                Swal.fire({
                    title: "Eliminar producto",
                    html: "<p>¿Está seguro que quiere eliminar al usuario: <strong>" + ProductName +
                        "</strong>?</p><p>Ya no podrá ingresar al sistema.</p>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Si, Eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.users.show-users', 'delete', UserId);
                    }
                });
            });
        </script>
    @stop
</div>
