<!-- Modal -->
<div wire:ignore.self class="modal fade UpdateWarehouse" id="UpdateNewSupplier" tabindex="-1" role="dialog"
    aria-labelledby="UpdateNewSupplier" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-triangle"></i> El siguiente productos se agregará independiente de
                    una compra.
                </div>
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="cod">Código:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="cod"
                                        placeholder="Escriba el código del producto" wire:model="cod">
                                </div>
                                @error('cod')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="form-group">
                                <label for="name">Producto:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-toolbox"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Escriba el nombre del producto" wire:model="name">
                                </div>
                                @error('name')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="brand">Marca:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-copyright"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="brand"
                                        placeholder="Escriba la marca del producto" wire:model="brand">
                                </div>
                                @error('brand')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="quantity">Cantidad:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-th"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="quantity"
                                        placeholder="Escriba la cantidad del producto" wire:model="quantity"
                                        min="1">
                                </div>
                                @error('quantity')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="cost">Costo:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="cost"
                                        placeholder="Escriba el precio de venta" wire:model="cost" min="1">
                                </div>
                                @error('cost')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="price">Precio:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-hand-holding-usd"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="price"
                                        placeholder="Escriba el precio de venta" wire:model="price" min="1">
                                </div>
                                @error('price')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="supplier_id">proveedor:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-people-carry"></i></span>
                                    </div>
                                    <select name="supplier_id" id="supplier_id" class="form-control"
                                        wire:model="supplier_id">
                                        <option value="">- Seleccione -</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->company }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('supplier_id')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="measure_id">Medida:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-ruler-horizontal"></i></span>
                                    </div>
                                    <select name="measure_id" id="measure_id" class="form-control"
                                        wire:model="measure_id">
                                        <option value="">- Seleccione -</option>
                                        @foreach ($measures as $measure)
                                            <option value="{{ $measure->id }}">{{ $measure->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('measure_id')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="warehouse_id">Bodega:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-warehouse"></i></span>
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
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="rack_id">Estante:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                    </div>
                                    <select name="rack_id" id="rack_id" class="form-control" wire:model="rack_id">
                                        <option value="">- Seleccione -</option>
                                        @foreach ($racks as $rack)
                                            <option value="{{ $rack->id }}">{{ $rack->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('rack_id')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="{{ $identificador }}">Imagen:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                    </div>
                                    <input type="file" wire:model="new_image" class="form-control"
                                        id="{{ $identificador }}">
                                </div>
                                @error('new_image')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row" wire:loading wire:target="image">
                        <div class="col-sm-12">
                            <div class="alert alert-danger" role="alert">
                                <strong><i class="fas fa-exclamation-triangle"></i> Cargando Imagen.</strong>
                                Espere hasta que se cargue la imagen. <i class="fas fa-spinner fa-pulse"></i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="update" type="button" class="btn btn-success"
                    wire:loading.attr="disabled" wire:loading.class.remove="btn-success"
                    wire:loading.class="btn btn-warning" wire:target="update"><span wire:loading.remove
                        wire:target="update"><i class="fas fa-exchange-alt"></i> Actualizar</span><span wire:loading
                        wire:target="update"><i class="fas fa-spinner fa-pulse"></i> Actualizando</span></button>
            </div>
        </div>
    </div>
</div>
