<!-- Modal -->
<div wire:ignore.self class="modal fade" id="UpdateNewRack" tabindex="-1" role="dialog" aria-labelledby="UpdateNewRack"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Estantería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="name">Estantería:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <input type="text" class="form-control" id="name"
                                placeholder="Escriba el nombre de la estantería, ejemplo: Estate 1" wire:model="name">
                        </div>
                        @error('name')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="warehouse_id">Bodega:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                            </div>
                            <select name="warehouse_id" id="warehouse_id" class="form-control"
                                wire:model="warehouse_id">
                                <option value="">- Seleccione -</option>
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('warehouse_id')
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
