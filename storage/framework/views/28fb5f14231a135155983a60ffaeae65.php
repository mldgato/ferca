<?php $__env->startSection('content_header'); ?>
    <h1>Información de la compra <i class="fas fa-file-alt"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <span class="text-primary"><i class="fas fa-people-carry"></i> Proveedor </span><span class="text-danger"><strong><?php echo e($supplier->company); ?></strong></span>
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
                            <div class="form-control"><?php echo e($supplier->taxnumber); ?></div>
                            <input type="hidden" name="supplier_id" id="supplier_id" value="<?php echo e($supplier->id); ?>">
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
                            <div class="form-control"><?php echo e($supplier->address); ?></div>
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
                            <div class="form-control"><?php echo e($supplier->phone); ?></div>
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
                            <div class="form-control"><?php echo e($supplier->seller); ?></div>
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
                            <div class="form-control"><?php echo e($buy->invoice); ?></div>
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
                            <div class="form-control"><?php echo e(date_format(date_create($buy->date), 'd-m-Y')); ?></div>
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
                            <div class="form-control"><?php echo e($buy->user->name); ?></div>
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
                        <?php $total = 0 ?>
                        <?php $__currentLoopData = $buydetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buydetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $total += $buydetail->cost * $buydetail->quantity ?>
                            <tr>
                                <td class="align-middle" style="width: 100px; height=100px">
                                    <img class="img-fluid"
                                        src="<?php if($buydetail->product->image): ?> <?php echo e(Storage::url($buydetail->product->image->url)); ?> <?php else: ?> https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg <?php endif; ?>"
                                        alt="">
                                </td>
                                <td><?php echo e($buydetail->product->cod); ?></td>
                                <td><?php echo e($buydetail->product->name); ?></td>
                                <td><?php echo e($buydetail->cost); ?></td>
                                <td><?php echo e($buydetail->quantity); ?></td>
                                <td>Q. <?php echo e(number_format($buydetail->cost * $buydetail->quantity, 2, '.', ',')); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" class="text-right">
                                <h3><strong>Total Q. <?php echo e(number_format($total, 2, '.', ',')); ?></strong></h3>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/stocktaking/buys/show.blade.php ENDPATH**/ ?>