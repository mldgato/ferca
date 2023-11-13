<div wire:init="loadUsers">
    <?php echo $__env->make('livewire.admin.users.update-user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.users.create-user')->html();
} elseif ($_instance->childHasBeenRendered('l3910753256-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3910753256-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3910753256-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3910753256-0');
} else {
    $response = \Livewire\Livewire::mount('admin.users.create-user');
    $html = $response->html();
    $_instance->logRenderedChild('l3910753256-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-3 mb-2">
                    <div class="d-flex align-items-center">
                        <span><strong>Mostrar</strong></span>
                        <span class="ml-2">
                            <select wire:model="cant" class="form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </span>
                        <span class="ml-2"><strong>registros</strong></span>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                        </div>
                        <input wire:model="search" id="searcher" type="text" class="form-control"
                            placeholder="Escriba para buscar" autofocus="autofocus" />
                    </div>
                </div>
            </div>
        </div>
        <?php if(count($users)): ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="cursor: pointer" wire:click="order('name')">
                                    Nombre
                                    <?php if($sort == 'name'): ?>
                                        <?php if($direction == 'asc'): ?>
                                            <i class="fas fa-sort-up ml-4"></i>
                                        <?php else: ?>
                                            <i class="fas fa-sort-down ml-4"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fas fa-sort ml-4"></i>
                                    <?php endif; ?>
                                </th>
                                <th style="cursor: pointer" wire:click="order('email')">
                                    Email
                                    <?php if($sort == 'email'): ?>
                                        <?php if($direction == 'asc'): ?>
                                            <i class="fas fa-sort-up ml-4"></i>
                                        <?php else: ?>
                                            <i class="fas fa-sort-down ml-4"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fas fa-sort ml-4"></i>
                                    <?php endif; ?>
                                </th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td class="text-right">
                                        <button wire:click="edit(<?php echo e($user->id); ?>)" data-toggle="modal"
                                            data-target="#UpdateUserData" class="btn btn-success btn-sm mr-2"
                                            title="Editar"><i class="fas fa-edit fa-fw"></i></button>

                                        <button wire:click="edit(<?php echo e($user->id); ?>)" data-toggle="modal"
                                            data-target="#UpdateUserPass" class="btn btn-primary btn-sm mr-2"
                                            title="Editar"><i class="fas fa-lock"></i></button>

                                        <button wire:click="edit(<?php echo e($user->id); ?>)" data-toggle="modal"
                                            data-target="#UpdateUserRole" class="btn btn-warning btn-sm mr-2"
                                            title="Editar"><i class="fas fa-user-tag"></i></button>

                                        <?php if(auth()->id() === $user->id): ?>
                                            <button class="btn btn-danger btn-sm" disabled><i
                                                    class="fas fa-trash-alt"></i></button>
                                        <?php else: ?>
                                            <a class="btn btn-danger btn-sm"
                                                wire:click="$emit('deleteUser', <?php echo e($user->id); ?>, '<?php echo e($user->name); ?>')"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php if($users->hasPages()): ?>
                <div class="card-footer">
                    <div class="d-flex justify-content-end"><?php echo e($users->links()); ?></div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="card-body">
                <strong class="text-danger">No se han encontrado registros...</strong>
            </div>
        <?php endif; ?>
    </div>
    <?php $__env->startSection('js'); ?>
        <script type="text/javascript">
            Livewire.on('closeModalMessaje', (title, message, type, mymodal) => {
                if (mymodal != 'null') {
                    $('#' + mymodal).modal('hide');
                }
                Swal.fire({
                    position: 'top-end',
                    icon: type,
                    title: title,
                    text: message,
                    showConfirmButton: false,
                    timer: 3000
                });
            });

            Livewire.on('deleteUser', (UserId, ProductName) => {
                Swal.fire({
                    title: "Eliminar producto",
                    html: "<p>¿Está seguro que quiere eliminar al usuario: <strong>" + ProductName +
                        "</strong>?</p><p>Ya no podrá ingresar al sistema.</p>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Si, Eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.users.show-users', 'delete', UserId);
                    }
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/livewire/admin/users/show-users.blade.php ENDPATH**/ ?>