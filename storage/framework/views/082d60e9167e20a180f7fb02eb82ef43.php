<?php $__env->startSection('content_header'); ?>
    <h1>Información de la venta código: <?php echo e($sale->id); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <span class="text-primary">Cliente <i class="fas fa-user-tag"></i></span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="taxnumber">NIT:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <div class="form-control"><?php echo e($sale->customer->nit); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="name">Cliente:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control"><?php echo e($sale->customer->name); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control"><?php echo e($sale->customer->email); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="form-group">
                        <label for="address">Dirección:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <div class="form-control"><?php echo e($sale->customer->address); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="phone">Teléfono:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <div class="form-control"><?php echo e($sale->customer->phone); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="totalMoney">Total:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-quora"></i></span>
                            </div>
                            <div class="form-control"><?php echo e(number_format($total, 2, '.', ',')); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="pay">Pago:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-quora"></i></span>
                            </div>
                            <div class="form-control"><?php echo e(number_format($sale->pay, 2, '.', ',')); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label for="change">Vuelto:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-quora"></i></span>
                            </div>
                            <div class="form-control"><?php echo e(number_format($sale->pay - $total, 2, '.', ',')); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <span class="text-danger">Detalle</span>
        </div>
        <div class="card-body">
            <table class="table table-sm table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $sale->saledetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saledetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="align-middle" style="width: 100px; height=100px"><img class="img-fluid"
                                    src="<?php if($saledetail->product->image): ?> <?php echo e(Storage::url($saledetail->product->image->url)); ?> <?php else: ?> https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg <?php endif; ?>"
                                    alt="">
                            </td>
                            <td><?php echo e($saledetail->product->name); ?></td>
                            <td><?php echo e($saledetail->quantity); ?></td>
                            <td>Q. <?php echo e(number_format($saledetail->price, 2, '.', ',')); ?></td>
                            <td>Q. <?php echo e(number_format($saledetail->price * $saledetail->price, 2, '.', ',')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/shop/sales/show.blade.php ENDPATH**/ ?>