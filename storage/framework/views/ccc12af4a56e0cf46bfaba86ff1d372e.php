<?php $__env->startSection('content_header'); ?>
    <h1>Ventas <i class="fas fa-fw fa-store "></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.shop.sales.show-my-sales')->html();
} elseif ($_instance->childHasBeenRendered('PaH3PIu')) {
    $componentId = $_instance->getRenderedChildComponentId('PaH3PIu');
    $componentTag = $_instance->getRenderedChildComponentTagName('PaH3PIu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PaH3PIu');
} else {
    $response = \Livewire\Livewire::mount('admin.shop.sales.show-my-sales');
    $html = $response->html();
    $_instance->logRenderedChild('PaH3PIu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/shop/sales/index.blade.php ENDPATH**/ ?>