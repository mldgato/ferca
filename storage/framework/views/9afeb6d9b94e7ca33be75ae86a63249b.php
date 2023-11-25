<?php $__env->startSection('content_header'); ?>
    <h1>Compras <i class="fas fa-file-invoice"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.stocktaking.buys.show-buys')->html();
} elseif ($_instance->childHasBeenRendered('N66yHzB')) {
    $componentId = $_instance->getRenderedChildComponentId('N66yHzB');
    $componentTag = $_instance->getRenderedChildComponentTagName('N66yHzB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('N66yHzB');
} else {
    $response = \Livewire\Livewire::mount('admin.stocktaking.buys.show-buys');
    $html = $response->html();
    $_instance->logRenderedChild('N66yHzB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/stocktaking/buys/index.blade.php ENDPATH**/ ?>