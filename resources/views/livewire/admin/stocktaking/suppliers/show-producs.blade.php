<div wire:init="loadProducts" wire:on="productAdded">

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        @livewire('admin.stocktaking.suppliers.create-product', ['supplier' => $supplier->id])
                        <a href="{{ route('admin.stocktaking.buys.cart', $supplier->id) }}"
                            class="btn btn-outline-danger btn-lg ml-2">Compra <i
                                class="fas fa-shopping-basket"></i></a>
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
        @if (count($products))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th style="cursor: pointer" wire:click="order('cod')">
                                    cod.
                                    @if ($sort == 'cod')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th style="cursor: pointer" wire:click="order('name')">
                                    Producto
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
                                <th style="cursor: pointer" wire:click="order('brand')">
                                    Marca
                                    @if ($sort == 'brand')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th style="cursor: pointer" wire:click="order('quantity')">
                                    Cant.
                                    @if ($sort == 'quantity')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th style="cursor: pointer" wire:click="order('cost')">
                                    Costo
                                    @if ($sort == 'cost')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th style="cursor: pointer" wire:click="order('price')">
                                    Precio
                                    @if ($sort == 'price')
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
                            @foreach ($products as $product)
                                <tr class="{{ $product->claseFila }}">
                                    <td class="align-middle" style="width: 89px; height=67px"><img class="img-fluid"
                                            src="@if ($product->image) {{ Storage::url($product->image->url) }} @else https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg @endif"
                                            alt="">
                                    </td>
                                    <td class="align-middle">{{ $product->cod }}</td>
                                    <td class="align-middle">{{ $product->name }}</td>
                                    <td class="align-middle">{{ $product->brand }}</td>
                                    <td class="align-middle">{{ $product->quantity }}</td>
                                    <td class="align-middle">{{ $product->presentCost() }}</td>
                                    <td class="align-middle">{{ $product->presentPrice() }}</td>

                                    <td class="align-middle text-right">
                                        <a href="{{ route('admin.stocktaking.buys.add_buy', $product->id) }}"
                                            class="btn btn-primary btn-sm mr-2" title="Agregar a la compra"><i
                                                class="fas fa-cart-plus"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Cod.</th>
                                <th>Producto</th>
                                <th>Marca</th>
                                <th>Cant.</th>
                                <th>Costo</th>
                                <th>Precio</th>
                                <th>&nbsp;</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @if ($products->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-end">{{ $products->links() }}</div>
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
        </script>
    @stop
</div>
