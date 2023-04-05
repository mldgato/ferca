<!-- Modal -->
<div wire:ignore.self class="modal fade" id="UpdateNewSupplier" tabindex="-1" role="dialog" aria-labelledby="UpdateNewSupplier" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="taxnumber">NIT:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <input type="text" class="form-control" id="taxnumber" placeholder="Escriba el número de NIT de la compañía" wire:model="taxnumber">
                        </div>
                        @error('taxnumber') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="company">Compañía:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <input type="text" class="form-control" id="company" placeholder="Escriba el nombre de la compañía" wire:model="company">
                        </div>
                        @error('company') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="address" placeholder="Escriba la dirección de la compañía" wire:model="address">
                        </div>
                        @error('address') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" class="form-control" id="phone" placeholder="Escriba el número de teléfono de la compañía" wire:model="phone">
                        </div>
                        @error('phone') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="seller">Vendedor:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <input type="text" class="form-control" id="seller" placeholder="Escriba el nombre del vendedor de la compañía" wire:model="seller">
                        </div>
                        @error('seller') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="update" type="button" class="btn btn-success" wire:loading.attr="disabled" wire:loading.class.remove="btn-success" wire:loading.class="btn btn-warning" wire:target="update"><span wire:loading.remove wire:target="update"><i class="fas fa-exchange-alt"></i> Actualizar</span><span wire:loading wire:target="update"><i class="fas fa-spinner fa-pulse"></i> Actualizando</span></button>
            </div>
       </div>
    </div>
</div>