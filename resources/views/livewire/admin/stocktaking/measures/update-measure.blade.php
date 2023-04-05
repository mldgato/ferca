<!-- Modal -->
<div wire:ignore.self class="modal fade" id="UpdateNewMeasure" tabindex="-1" role="dialog" aria-labelledby="UpdateNewMeasure" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Medida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="form-group">
                        <label for="unit">Medida:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <input type="text" class="form-control" id="unit" placeholder="Escriba la unidad de medida" wire:model="unit">
                        </div>
                        @error('unit') <span class="text-danger error">{{ $message }}</span>@enderror
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