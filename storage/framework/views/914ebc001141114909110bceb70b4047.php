<?php $__env->startSection('content_header'); ?>
    <h1>Listado de clientes <i class="fas fa-fw fa-user-tag "></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.shop.customers.show-customers')->html();
} elseif ($_instance->childHasBeenRendered('QuusMkv')) {
    $componentId = $_instance->getRenderedChildComponentId('QuusMkv');
    $componentTag = $_instance->getRenderedChildComponentTagName('QuusMkv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QuusMkv');
} else {
    $response = \Livewire\Livewire::mount('admin.shop.customers.show-customers');
    $html = $response->html();
    $_instance->logRenderedChild('QuusMkv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/shop/customers/index.blade.php ENDPATH**/ ?>