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
        <?php $total = 0 ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $total += $product->cost * $product->quantity ?>
            <tr>
                <td><?php echo e($product->cod); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->measure->unit); ?></td>
                <td><?php echo e($product->quantity); ?></td>
                <td>Q. <?php echo e(number_format($product->cost, 2, '.', ',')); ?></td>
                <td>Q. <?php echo e(number_format($product->cost * $product->quantity, 2, '.', ',')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6">
                Q. <?php echo e(number_format($total, 2, '.', ',')); ?>

            </th>
        </tr>
    </tfoot>
</table>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/stocktaking/products/pdfinventory.blade.php ENDPATH**/ ?>