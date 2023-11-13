<div>
    <!-- Button -->
    <button type="button" class="btn btn-outline-primary btn-lg ml-2" data-toggle="modal" data-target="#CreateNewUser">
        <i class="fas fa-plus-circle"></i> Nuevo usuario
    </button>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="CreateNewUser" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" role="dialog" aria-labelledby="CreateNewUserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CreateNewUserLabel">Agregar nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Escriba el nombre completo del usuario" wire:model="name">
                            </div>
                            @error('name')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" id="email"
                                    placeholder="Escriba el nombre de la compañía" wire:model="email">
                            </div>
                            @error('email')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password"
                                    placeholder="Escriba el nombre completo del usuario" wire:model="password">
                            </div>
                            @error('password')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_repeat">Repetir:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-redo-alt"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password_repeat"
                                    placeholder="Escriba el nombre de la compañía" wire:model="password_repeat">
                            </div>
                            @error('password_repeat')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger close-btn" data-dismiss="modal"
                        wire:click="resetFields"><i class="fas fa-window-close"></i> Cerrar</button>

                    <button type="button" class="btn btn-success" wire:click="save" wire:loading.attr="disabled"
                        wire:loading.class.remove="btn-success" wire:loading.class="btn btn-warning"
                        wire:target="save"><span wire:loading.remove wire:target="save"><i class="fas fa-save"></i>
                            Guardar</span><span wire:loading wire:target="save"><i class="fas fa-spinner fa-pulse"></i>
                            Guardando</span></button>
                </div>
            </div>
        </div>
    </div>
</div>
