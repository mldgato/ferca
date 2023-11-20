<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }
    h1{}

    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 8pt;
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
    .alignright{
        text-align: right;
    }
</style>

<body>
    <div id="divTop"></div>

    <h1>CORFEJISA</h1>
    <h2>Correlativo de venta #{{ $sale->id }}</h2>
    <table>
        <tbody>
            <tr>
                <td>Cliente: {{  $sale->customer->name }}</td>
                <td>Fecha: {{ \Carbon\Carbon::parse($sale->date)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td colspan="2">Venta realizada por: {{ $sale->user->name }}</td>
            </tr>
        </tbody>
    </table>

    @if ($sale->saledetails)
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach ($sale->saledetails as $detail)
                @php $total += $detail->price * $detail->quantity @endphp
                <tr>
                    <td>{{ $detail->product->cod }}</td>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td class="alignright">Q. {{ number_format($detail->price, 2, '.', ',') }}</td>
                    <td class="alignright">Q. {{ number_format($detail->price * $detail->quantity, 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">
                    Q. {{ number_format($total, 2, '.', ',') }}
                </th>
            </tr>
        </tfoot>
    </table>
    @endif
</body>
