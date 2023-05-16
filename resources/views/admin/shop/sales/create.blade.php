@extends('adminlte::page')

@section('content_header')
    <h1>Nueva venta <i class="fas fa-cash-register"></i></h1>
@stop

@section('content')
    <form action="{{ route('admin.shop.sales.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <span class="text-primary"><i class="fas fa-info"></i> Información del cliente</span>
            </div>
            <div class="card-body">
                @if (session('cart_sale'))
                    @livewire('admin.shop.sales.customer-data')
                @endif
            </div>
        </div>
        @if (session('message'))
            <div class="row">
                <div class="col">
                    <div id="AlertaExito" class="alert {{ session('class') }} alert-dismissible fade show" role="alert">
                        <strong>{{ session('title') }}</strong> {{ session('message') }}
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
                            <a href="{{ route('admin.shop.sales.products') }}"
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
                                <th>&nbsp;</th>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th style="width: 15%">Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart_sale'))
                                @foreach (session('cart_sale') as $id => $details)
                                    @php $total += floatval($details['price']) * $details['quantity'] @endphp
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
                                            Q. {{ number_format($details['price'], 2, '.', ',') }}
                                            <input type="hidden" value="{{ $details['price'] }}" name="price[]">
                                        </td>
                                        <td><input type="number" value="{{ $details['quantity'] }}"
                                                class="form-control quantity update-quantity" min="1"
                                                max="{{ $details['nowquantity'] }}" name="quantity[]"
                                                id="quantity_{{ $id }}" required />
                                            @error('quantity')
                                                <span class="text-danger error">{{ $message }}</span>
                                            @enderror
                                        </td>
                                        <td>Q.
                                            {{ number_format(floatval($details['price']) * $details['quantity'], 2, '.', ',') }}
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
                                <td colspan="6" class="text-right">
                                    <h3><strong>Total Q. {{ number_format($total, 2, '.', ',') }}</strong></h3>
                                    <input type="hidden" name="total" id="total" value="{{ $total }}">
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        @if (session('cart_sale'))
                            <button type="button" class="btn btn-danger btn-lg cancel-venta">Cancelar venta <i
                                    class="fas fa-window-close"></i></button>
                        @endif
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex justify-content-end">
                            @if (session('cart_sale'))
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

@stop

@section('js')
    <script type="text/javascript">
        // Agrega un evento al botón de envío del formulario
        document.getElementById('btnsubmit').addEventListener('click', function(event) {
            event.preventDefault(); // Evita el envío del formulario por defecto

            // Muestra la ventana de confirmación
            Swal.fire({
                title: '¿Estás seguro de proceder con la venta?',
                text: 'Una vez confirmada, la venta no se puede deshacer.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, proceder',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se hace clic en "Sí, proceder", envía el formulario
                    document.getElementById('btnsubmit').disabled = true; // Deshabilita el botón de envío para evitar múltiples envíos
                    document.getElementById('btnsubmit').form.submit(); // Envía el formulario
                }
            });
        });
        $(".update-quantity").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('admin.shop.sales.update_quantity') }}',
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
                html: "<p><strong>¿Está seguro que quiere quitar este producto de la venta?</strong></p><p>El producto se quitará pero, podrá agregarlo nuevamente.</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, quitar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.shop.sales.remove_from_cart') }}',
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
                title: 'Cancelar la venta',
                html: "<p><strong>¿Está seguro que quiere cancelar la venta?</strong></p><p>No podrá continuar y se eliminarán todos los productos seleccionados.</p>",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('admin.shop.sales.cancel_sale') }}',
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
                title: 'Venta eliminada',
                text: "{{ session('deletesale') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@stop
