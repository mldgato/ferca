<!-- Modal -->
<div wire:ignore.self class="modal fade" id="UpdateUserData" tabindex="-1" role="dialog" aria-labelledby="UpdateUserData"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="name"
                                placeholder="Escriba el nombre completo del usuario" wire:model="name">
                        </div>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" id="email"
                                placeholder="Escriba el nombre de la compañía" wire:model="email">
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="update" type="button" class="btn btn-success" wire:loading.attr="disabled"
                    wire:loading.class.remove="btn-success" wire:loading.class="btn btn-warning"
                    wire:target="update"><span wire:loading.remove wire:target="update"><i
                            class="fas fa-exchange-alt"></i> Actualizar</span><span wire:loading wire:target="update"><i
                            class="fas fa-spinner fa-pulse"></i> Actualizando</span></button>
            </div>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="UpdateUserPass" tabindex="-1" role="dialog"
    aria-labelledby="UpdateUserPass" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar Contraseña del Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password"
                                placeholder="Escriba el nombre completo del usuario" wire:model="password">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <label for="password_repeat">Repetir:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-redo-alt"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password_repeat"
                                placeholder="Escriba el nombre de la compañía" wire:model="password_repeat">
                        </div>
                        <?php $__errorArgs = ['password_repeat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="updatePass" type="button" class="btn btn-success"
                    wire:loading.attr="disabled" wire:loading.class.remove="btn-success"
                    wire:loading.class="btn btn-warning" wire:target="updatePass"><span wire:loading.remove
                        wire:target="updatePass"><i class="fas fa-exchange-alt"></i> Actualizar</span><span
                        wire:loading wire:target="updatePass"><i class="fas fa-spinner fa-pulse"></i>
                        Actualizando</span></button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="UpdateUserRole" tabindex="-1" role="dialog"
    aria-labelledby="UpdateUserRole" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar roles de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Usuario:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <input type="text" class="form-control" id="name"
                                placeholder="Escriba el nombre completo del usuario" wire:model="name" disabled>
                        </div>
                    </div>
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <label>
                                <input type="checkbox" name="roles[]" value="<?php echo e($role->id); ?>"
                                    wire:model="selectedRoles"
                                    <?php echo e(in_array($role->id, $selectedRoles) ? 'checked' : ''); ?>>
                                <?php echo e($role->name); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click="resetFields" type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Cerrar</button>

                <button wire:click.prevent="updateRole" type="button" class="btn btn-success"
                    wire:loading.attr="disabled" wire:loading.class.remove="btn-success"
                    wire:loading.class="btn btn-warning" wire:target="updateRole"><span wire:loading.remove
                        wire:target="updateRole"><i class="fas fa-exchange-alt"></i> Actualizar</span><span
                        wire:loading wire:target="updateRole"><i class="fas fa-spinner fa-pulse"></i>
                        Actualizando</span></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/livewire/admin/users/update-user.blade.php ENDPATH**/ ?>