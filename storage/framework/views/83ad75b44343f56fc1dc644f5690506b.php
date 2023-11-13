<?php $__env->startSection('content_header'); ?>
    <h1>Ventas <i class="fas fa-fw fa-store "></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('message')): ?>
        <div class="row">
            <div class="col">
                <div id="AlertaExito" class="alert <?php echo e(session('class')); ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo e(session('title')); ?></strong> <?php echo e(session('message')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.shop.sales.show-products')->html();
} elseif ($_instance->childHasBeenRendered('d96gPuj')) {
    $componentId = $_instance->getRenderedChildComponentId('d96gPuj');
    $componentTag = $_instance->getRenderedChildComponentTagName('d96gPuj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('d96gPuj');
} else {
    $response = \Livewire\Livewire::mount('admin.shop.sales.show-products');
    $html = $response->html();
    $_instance->logRenderedChild('d96gPuj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/shop/sales/products.blade.php ENDPATH**/ ?>