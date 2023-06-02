@extends('adminlte::page')

@section('content_header')
    <h1>Información de la compra <i class="fas fa-file-alt"></i></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <span class="text-primary"><i class="fas fa-people-carry"></i> Proveedor </span><span class="text-danger"><strong>{{ $supplier->company }}</strong></span>
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
                            <div class="form-control">{{ $buy->invoice }}</div>
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
                            <div class="form-control">{{ date_format(date_create($buy->date), 'd-m-Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label>Compra ingresada por:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                            </div>
                            <div class="form-control">{{ $buy->user->name }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12">
                    <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
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
                            <th>Costo</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach ($buydetails as $buydetail)
                            @php $total += $buydetail->cost * $buydetail->quantity @endphp
                            <tr>
                                <td class="align-middle" style="width: 100px; height=100px">
                                    <img class="img-fluid"
                                        src="@if ($buydetail->product->image) {{ Storage::url($buydetail->product->image->url) }} @else https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg @endif"
                                        alt="">
                                </td>
                                <td>{{ $buydetail->product->cod }}</td>
                                <td>{{ $buydetail->product->name }}</td>
                                <td>{{ $buydetail->cost }}</td>
                                <td>{{ $buydetail->quantity }}</td>
                                <td>Q. {{ number_format($buydetail->cost * $buydetail->quantity, 2, '.', ',') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" class="text-right">
                                <h3><strong>Total Q. {{ number_format($total, 2, '.', ',') }}</strong></h3>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
