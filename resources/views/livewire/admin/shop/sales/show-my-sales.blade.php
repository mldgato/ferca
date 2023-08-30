<div wire:init="loadSales">
    <div class="card mb-3">
        <div class="card-header">
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
        @if (count($sales))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="cursor: pointer" wire:click="order('id')">
                                    Venta
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th style="cursor: pointer" wire:click="order('nit')">
                                    NIT
                                    @if ($sort == 'nit')
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
                                    Vendedor
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
                                <th style="cursor: pointer" wire:click="order('total')">
                                    Total
                                    @if ($sort == 'total')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up ml-4"></i>
                                        @else
                                            <i class="fas fa-sort-down ml-4"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort ml-4"></i>
                                    @endif
                                </th>
                                <th>
                                    Fecha
                                </th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td class="align-middle">{{ $sale->id }}</td>
                                    <td class="align-middle">{{ $sale->nit }}</td>
                                    <td class="align-middle">{{ $sale->name }}</td>
                                    <td class="align-middle">Q. {{ number_format($sale->total, 2, '.', ',') }}</td>
                                    <td class="align-middle">{{ $sale->date }}</td>

                                    <td class="align-middle text-right">
                                        <a href="{{ route('admin.shop.sales.show', $sale->id) }}"
                                            class="btn btn-primary btn-sm mr-2" title="Agregar a la compra"><i
                                                class="fas fa-file-invoice-dollar"></i></a>
                                        <a href="#{{-- {{ route('admin.stocktaking.buys.pdf', $sale->id) }} --}}"
                                            class="btn btn-danger btn-sm mr-2" title="PDF" target="_blank"><i
                                                class="fas fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Venta</th>
                                <th>NIT</th>
                                <th>Vendedor</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @if ($sales->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-end">{{ $sales->links() }}</div>
                </div>
            @endif
        @else
            <div class="card-body">
                <strong class="text-danger">No se han encontrado registros...</strong>
            </div>
        @endif
    </div>
</div>
