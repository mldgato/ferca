<?php $__env->startSection('content_header'); ?>
    <h1>Sistema de punto de ventas <i class="fas fa-sitemap"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Usuarios')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>Usuarios</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?php echo e(route('admin.users.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Proveedores')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>Proveedores</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-people-carry"></i>
                    </div>
                    <a href="<?php echo e(route('admin.stocktaking.suppliers.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Medidas')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>Medidas</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-ruler-horizontal"></i>
                    </div>
                    <a href="<?php echo e(route('admin.stocktaking.measures.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Bodegas')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>Bodegas</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <a href="<?php echo e(route('admin.stocktaking.warehouses.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Estanterías')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>Estaterías</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <a href="<?php echo e(route('admin.stocktaking.racks.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Productos')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>Productos</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-toolbox"></i>
                    </div>
                    <a href="<?php echo e(route('admin.stocktaking.products.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Compras')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box">
                    <div class="inner">
                        <h3>Compras</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-basket"></i>
                    </div>
                    <a href="<?php echo e(route('admin.stocktaking.buys.index')); ?>" class="small-box-footer text-secondary">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Mis ventas')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3>Mis ventas</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="<?php echo e(route('admin.shop.sales.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Clientes')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3>Clientes</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-child"></i>
                    </div>
                    <a href="<?php echo e(route('admin.shop.customers.index')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Tienda')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-teal">
                    <div class="inner">
                        <h3>Tienda</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <a href="<?php echo e(route('admin.shop.sales.products')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Ventas generales')): ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>Reporte</h3>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <a href="<?php echo e(route('admin.shop.sales.list')); ?>" class="small-box-footer">Acceder <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        console.log('Hi!');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/index.blade.php ENDPATH**/ ?>