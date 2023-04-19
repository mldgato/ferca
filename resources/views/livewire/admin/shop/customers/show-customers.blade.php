<div wire:init="loadCustomers">
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
        @if (count($customers))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
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
                                    Cliente
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
                                <th style="cursor: pointer" wire:click="order('phone')">
                                    Teléfono
                                    @if ($sort == 'phone')
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
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->nit }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td><a href="tel:{{ $customer->phone }}">{{ $customer->phone }}</a></td>
                                    <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                                    <td class="text-right">
                                        <a href="" class="btn btn-success btn-sm mr-2" title="Compras del cliente"><i
                                                class="fas fa-wallet"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NIT</th>
                                <th>Cliente</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            @if ($customers->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-end">{{ $customers->links() }}</div>
                </div>
            @endif
        @else
            <div class="card-body">
                <strong class="text-danger">No se han encontrado registros...</strong>
            </div>
        @endif
    </div>
    @section('js')

    @stop
