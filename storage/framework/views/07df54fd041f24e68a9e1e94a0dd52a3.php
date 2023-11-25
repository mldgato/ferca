<?php $__env->startSection('content_header'); ?>
    <h1>Lista de ventas <i class="far fa-list-alt"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.shop.sales.sales-list')->html();
} elseif ($_instance->childHasBeenRendered('xSrVUjj')) {
    $componentId = $_instance->getRenderedChildComponentId('xSrVUjj');
    $componentTag = $_instance->getRenderedChildComponentTagName('xSrVUjj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xSrVUjj');
} else {
    $response = \Livewire\Livewire::mount('admin.shop.sales.sales-list');
    $html = $response->html();
    $_instance->logRenderedChild('xSrVUjj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/shop/sales/list.blade.php ENDPATH**/ ?>