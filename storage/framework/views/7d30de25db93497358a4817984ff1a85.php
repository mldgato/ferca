<?php $__env->startSection('content_header'); ?>
    <h1>Lista de usuarios <i class="fas fa-users"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.users.show-users')->html();
} elseif ($_instance->childHasBeenRendered('gwTyeZh')) {
    $componentId = $_instance->getRenderedChildComponentId('gwTyeZh');
    $componentTag = $_instance->getRenderedChildComponentTagName('gwTyeZh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gwTyeZh');
} else {
    $response = \Livewire\Livewire::mount('admin.users.show-users');
    $html = $response->html();
    $_instance->logRenderedChild('gwTyeZh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/users/index.blade.php ENDPATH**/ ?>