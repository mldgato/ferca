<!-- Modal -->
<div wire:ignore.self class="modal fade" id="UpdateUserData" tabindex="-1" role="dialog"
    aria-labelledby="UpdateUserData" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
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
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="update" type="button" class="btn btn-success" wire:loading.attr="disabled"
                    wire:loading.class.remove="btn-success" wire:loading.class="btn btn-warning"
                    wire:target="update"><span wire:loading.remove wire:target="update"><i
                            class="fas fa-exchange-alt"></i> Actualizar</span><span wire:loading wire:target="update"><i
                            class="fas fa-spinner fa-pulse"></i> Actualizando</span></button>
            </div>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="UpdateUserPass" tabindex="-1" role="dialog"
    aria-labelledby="UpdateUserPass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Contraseña del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
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
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="updatePass" type="button" class="btn btn-success" wire:loading.attr="disabled"
                    wire:loading.class.remove="btn-success" wire:loading.class="btn btn-warning"
                    wire:target="updatePass"><span wire:loading.remove wire:target="updatePass"><i
                            class="fas fa-exchange-alt"></i> Actualizar</span><span wire:loading wire:target="updatePass"><i
                            class="fas fa-spinner fa-pulse"></i> Actualizando</span></button>
            </div>
        </div>
    </div>
</div>