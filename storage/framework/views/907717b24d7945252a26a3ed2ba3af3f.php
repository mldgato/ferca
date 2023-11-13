

<?php $__env->startSection('content_header'); ?>
    <h1>Crear un nuevo rol <i class="fas fa-id-card-alt"></i></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-3">
        <div class="card-header">
            <span class="text-primary">Nombre del nuevo rol <i class="fas fa-users-cog"></i></span>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.roles.store')); ?>" method="POST" autocomplete="off">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="name">Rol:</label>
                            <input type="text" name="name" class="form-control"
                                placeholder="Ingrese el nombre del nuevo rol">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="text-danger"><?php echo e($message); ?></small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h2 class="text-danger">Lista de permisos <i class="fas fa-user-shield"></i></h2>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <label>
                                    <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>"
                                        class="mr-1">
                                    <?php echo e($permission->name); ?>

                                </label>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" name="submitRole" class="btn btn-success">Guardar <i
                                class="fas fa-save"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ferca\resources\views/admin/roles/create.blade.php ENDPATH**/ ?>