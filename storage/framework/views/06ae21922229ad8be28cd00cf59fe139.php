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
    <h2>Correlativo de venta #<?php echo e($sale->id); ?></h2>
    <table>
        <tbody>
            <tr>
                <td>Cliente: <?php echo e($sale->customer->name); ?></td>
                <td>Fecha: <?php echo e(\Carbon\Carbon::parse($sale->date)->format('d-m-Y')); ?></td>
            </tr>
            <tr>
                <td colspan="2">Venta realizada por: <?php echo e($sale->user->name); ?></td>
            </tr>
        </tbody>
    </table>

    <?php if($sale->saledetails): ?>
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
            <?php $total = 0 ?>
            <?php $__currentLoopData = $sale->saledetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total += $detail->price * $detail->quantity ?>
                <tr>
                    <td><?php echo e($detail->product->cod); ?></td>
                    <td><?php echo e($detail->product->name); ?></td>
                    <td><?php echo e($detail->quantity); ?></td>
                    <td class="alignright">Q. <?php echo e(number_format($detail->price, 2, '.', ',')); ?></td>
                    <td class="alignright">Q. <?php echo e(number_format($detail->price * $detail->quantity, 2, '.', ',')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">
                    Q. <?php echo e(number_format($total, 2, '.', ',')); ?>

                </th>
            </tr>
        </tfoot>
    </table>
    <?php endif; ?>
</body>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/shop/sales/pdf.blade.php ENDPATH**/ ?>