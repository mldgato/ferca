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

    tfoot tr th {
        text-align: right !important;
    }
</style>
<h1>CORFEJISA</h1>
<h2>Inventario de productos</h2>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Producto</th>
            <th>Medida</th>
            <th>Cantidad</th>
            <th>Costo</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach ($products as $product)
            @php $total += $product->cost * $product->quantity @endphp
            <tr>
                <td>{{ $product->cod }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->measure->unit }}</td>
                <td>{{ $product->quantity }}</td>
                <td>Q. {{ number_format($product->cost, 2, '.', ',') }}</td>
                <td>Q. {{ number_format($product->cost * $product->quantity, 2, '.', ',') }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6">
                Q. {{ number_format($total, 2, '.', ',') }}
            </th>
        </tr>
    </tfoot>
</table>
