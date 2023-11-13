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
    tfoot tr th{
        text-align: right !important;
    }
</style>
<h1>Ferca</h1>
<h2>Compra #<?php echo e($buy->id); ?> - Factura: <?php echo e($buy->invoice); ?></h2>
<table>
    <tbody>
        <tr>
            <td>Proveedor: <?php echo e($buy->supplier ? $buy->supplier->company : 'N/A'); ?></td>
            <td>Fecha: <?php echo e(\Carbon\Carbon::parse($buy->date)->format('d-m-Y')); ?></td>
        </tr>
        <tr>
            <td colspan="2">Compra realizada por: <?php echo e($buy->user ? $buy->user->name : 'N/A'); ?></td>
        </tr>
    </tbody>
</table>

<?php if($buy->buydetails): ?>
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
            <?php $total = 0 ?>
            <?php $__currentLoopData = $buy->buydetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total += $detail->cost * $detail->quantity ?>
                <tr>
                    <td><?php echo e($detail->product->cod); ?></td>
                    <td><?php echo e($detail->product->name); ?></td>
                    <td><?php echo e($detail->quantity); ?></td>
                    <td>Q. <?php echo e(number_format($detail->cost, 2, '.', ',')); ?></td>
                    <td>Q. <?php echo e(number_format($detail->cost * $detail->quantity, 2, '.', ',')); ?></td>
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
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/stocktaking/buys/pdf.blade.php ENDPATH**/ ?>