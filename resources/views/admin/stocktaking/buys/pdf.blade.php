<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 10pt;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<h1>Ferca</h1>
<h2>Compra #{{ $buy->id }} - Factura: {{ $buy->invoice }}</h2>
<table>
    <tbody>
        <tr>
            <td>Proveedor: {{ $buy->supplier ? $buy->supplier->company : 'N/A' }}</td>
            <td>Fecha: {{ \Carbon\Carbon::parse($buy->date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td>Compra realizada por: {{ $buy->user ? $buy->user->name : 'N/A' }}</td>
            <td>Total: <strong>{{ number_format($buy->total, 2, '.', ',') }}</strong></td>
        </tr>
    </tbody>
</table>

@if ($buy->buydetails)
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Costo</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buy->buydetails as $detail)
                <tr>
                    <td>{{ $detail->product->cod }}</td>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Q. {{ number_format($detail->cost, 2, '.', ',') }}</td>
                    <td>Q. {{ number_format($detail->cost * $detail->quantity, 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
