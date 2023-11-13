<?php $__env->startSection('content_header'); ?>
    <h1>Compras <i class="fas fa-file-invoice"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.stocktaking.buys.show-buys')->html();
} elseif ($_instance->childHasBeenRendered('9dY2dnf')) {
    $componentId = $_instance->getRenderedChildComponentId('9dY2dnf');
    $componentTag = $_instance->getRenderedChildComponentTagName('9dY2dnf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9dY2dnf');
} else {
    $response = \Livewire\Livewire::mount('admin.stocktaking.buys.show-buys');
    $html = $response->html();
    $_instance->logRenderedChild('9dY2dnf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/stocktaking/buys/index.blade.php ENDPATH**/ ?>