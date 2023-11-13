<?php $__env->startSection('content_header'); ?>
    <div class="row">
        <div class="col">
            <h1><i class="fas fa-building"></i> Proveedor: <span class="text-danger"><?php echo e($supplier->company); ?></span></h1>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="<?php echo e(route('admin.stocktaking.suppliers.index')); ?>" class="btn btn-outline-warning btn-lg"
                    title="Regresar"><i class="fas fa-backward"></i></a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header">
            <span class="text-primary"><i class="fas fa-info"></i> Información</span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="form-group">
                        <label for="taxnumber">NIT:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fab fa-slack-hash"></i></span>
                            </div>
                            <div class="form-control"><?php echo e($supplier->taxnumber); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
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
            </div>
            <div class="row">
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
                <div class="col-sm-12 col-md-9">
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
            </div>
        </div>
    </div>
    <?php if(session('success')): ?>
        <div class="row">
            <div class="col">
                <div id="AlertaExito" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>¡Producto agregado!</strong> <?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.stocktaking.suppliers.show-producs', ['supplier' => $supplier])->html();
} elseif ($_instance->childHasBeenRendered('lgZe4WE')) {
    $componentId = $_instance->getRenderedChildComponentId('lgZe4WE');
    $componentTag = $_instance->getRenderedChildComponentTagName('lgZe4WE');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lgZe4WE');
} else {
    $response = \Livewire\Livewire::mount('admin.stocktaking.suppliers.show-producs', ['supplier' => $supplier]);
    $html = $response->html();
    $_instance->logRenderedChild('lgZe4WE', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <div class="d-flex justify-content-end">
        <b>Version</b> 1.3
    </div>
    <strong>Sistema de Puntos de Venta. Todos los derechos reservados © 2022 - <?php echo e(date('Y')); ?>. </strong>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            var myAlert = document.querySelector('#AlertaExito');
            setTimeout(function() {
                myAlert.classList.remove('show');
            }, 3000);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/stocktaking/suppliers/show.blade.php ENDPATH**/ ?>