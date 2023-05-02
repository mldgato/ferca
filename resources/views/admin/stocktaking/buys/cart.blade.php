@extends('adminlte::page')

@section('content_header')
    <h1>Compra <i class="fas fa-shopping-cart"></i></h1>
@stop

@section('content')
    <form action="{{ route('admin.stocktaking.buys.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <span class="text-primary"><i class="fas fa-info"></i> Información</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="taxnumber">NIT:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                                </div>
                                <div class="form-control">{{ $supplier->taxnumber }}</div>
                                <input type="hidden" name="supplier_id" id="supplier_id" value="{{ $supplier->id }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="form-group">
                            <label for="address">Dirección:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                                </div>
                                <div class="form-control">{{ $supplier->address }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="phone">Teléfono:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <div class="form-control">{{ $supplier->phone }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="seller">Vendedor:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                </div>
                                <div class="form-control">{{ $supplier->seller }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="invoice">Factura:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-invoice"></i></span>
                                </div>
                                <input type="text" name="invoice" id="invoice"
                                    class="form-control @error('invoice')is-invalid @enderror" required
                                    placeholder="Escriba el número de factura" value="{{ old('invoice') }}">
                                @error('invoice')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="invoice">Fecha:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" name="date" id="date"
                                    class="form-control @error('invoice')is-invalid @enderror" required
                                    max="{{ date('Y-m-d') }}" value="{{ old('date') }}">
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('success'))
            <div class="row">
                <div class="col">
                    <div id="AlertaExito" class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>¡Proceso registrado!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.stocktaking.suppliers.show', $supplier->id) }}"
                                class="btn btn-outline-warning btn-lg ml-2">Seleccionar más productos <i
                                    class="fas fa-backward"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="cart" class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width:10%">&nbsp;</th>
                                <th style="width:10%">Código</th>
                                <th style="width:25%">Producto</th>
                                <th style="width:20%">Costo</th>
                                <th style="width:20%">Cantidad</th>
                                <th style="width:10%">Subtotal</th>
                                <th style="width:5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += floatval($details['cost']) * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td class="align-middle" style="width: 100px; height=100px">
                                            <input type="hidden" name="product_id[]" value="{{ $id }}">
                                            <img class="img-fluid"
                                                src="@if ($details['image'] != 'No_image') {{ Storage::url($details['image']) }} @else https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg @endif"
                                                alt="">
                                        </td>
                                        <td>{{ $details['cod'] }}</td>
                                        <td>{{ $details['name'] }}</td>
                                        <td>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Q</div>
                                                </div>
                                                <input type="text" value="{{ $details['cost'] }}"
                                                    class="form-control cost update-cost change-cost" name="cost[]"
                                                    id="cost_{{ $id }}" required>
                                            </div>
                                        </td>
                                        <td><input type="number" value="{{ $details['quantity'] }}"
                                                class="form-control quantity update-quantity" min="1"
                                                name="quantity[]" id="quantity_{{ $id }}" required />
                                        </td>
                                        <td>Q.
                                            {{ number_format(floatval($details['cost']) * $details['quantity'], 2, '.', ',') }}
                                        </td>
                                        <td class="actions" class="align-middle text-center">
                                            <button type="button" class="btn btn-danger btn-sm remove-from-cart"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7" class="text-right">
                                    <h3><strong>Total Q. {{ number_format($total, 2, '.', ',') }}</strong></h3>
                                    <input type="hidden" name="total" id="total" value="{{ $total }}">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        @if (session('cart'))
                            <button type="button" class="btn btn-danger btn-lg cancel-venta">Cancelar venta <i
                                    class="fas fa-window-close"></i></button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex justify-content-end">
                            @if (session('cart'))
                                <button type="submit" id="btnsubmit" class="btn btn-success btn-lg">Guardar <i
                                        class="fas fa-shopping-cart"></i></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script type="text/javascript">
        var original;
        $('.change-cost').focus(function() {
            original = $(this).val();
            console.log(original);
        });

        $(".update-cost").change(function(e) {
            e.preventDefault();

            var ele = $(this);
            var valor = ele.parents("tr").find(".cost").val();
            if (valor >= 1) {
                Swal.fire({
                    title: 'Cambio de costo de producto',
                    html: "<p><strong>¿Está seguro que quiere cambiar el costo?</strong></p><p>Tome en cuenta que esto actualizará el costo del producto en el sistema, pueda ser que necesite actualizar el precio de venta de este producto.</p><p class='text-danger'>El cambio se realizará hasta que guarde esta compra.</p>",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, continuar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.stocktaking.buys.update_cost') }}',
                            method: "patch",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: ele.parents("tr").attr("data-id"),
                                quantity: ele.parents("tr").find(".cost").val()
                            },
                            success: function(response) {
                                window.location.reload();
                            }
                        });
                    } else {
                        ele.parents("tr").find(".cost").val(original);
                        ele.parents("tr").find(".cost").blur();
                    }
                });
            } else {
                ele.parents("tr").find(".cost").val(original);
                ele.parents("tr").find(".cost").blur();
            }

        });

        $(".update-quantity").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('admin.stocktaking.buys.update_quantity') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            Swal.fire({
                title: 'Quitar producto',
                html: "<p><strong>¿Está seguro que quiere quitar este producto de la compra?</strong></p><p>El producto se quitará pero, podrá agregarlo nuevamente.</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quitar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.stocktaking.buys.remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });

        $(".cancel-venta").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Cancelar la compra',
                html: "<p><strong>¿Está seguro que quiere cancelar la compra?</strong></p><p>No podrá continuar y se eliminarán todos los productos seleccionados.</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.stocktaking.buys.cancel_buy') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });

        });
    </script>
    @if (session('deletesale'))
    <script type="text/javascript">
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Compra eliminada',
            text: "{{ session('deletesale') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endif
@stop
