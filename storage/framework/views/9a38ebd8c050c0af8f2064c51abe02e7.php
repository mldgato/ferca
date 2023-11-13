<div wire:init="loadProducts">
    <?php echo $__env->make('livewire.admin.stocktaking.products.update-product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end">
                        <a href="<?php echo e(route('admin.stocktaking.products.inventorypdf')); ?>"
                            class="btn btn-outline-danger btn-lg ml-2">
                            <i class="fas fa-file-pdf"></i> Descargar Inventario
                        </a>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.stocktaking.products.create-product')->html();
} elseif ($_instance->childHasBeenRendered('l2258423072-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2258423072-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2258423072-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2258423072-0');
} else {
    $response = \Livewire\Livewire::mount('admin.stocktaking.products.create-product');
    $html = $response->html();
    $_instance->logRenderedChild('l2258423072-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
        <?php if(count($products)): ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th style="cursor: pointer" wire:click="order('cod')">
                                    cod.
                                    <?php if($sort == 'cod'): ?>
                                        <?php if($direction == 'asc'): ?>
                                            <i class="fas fa-sort-up ml-4"></i>
                                        <?php else: ?>
                                            <i class="fas fa-sort-down ml-4"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fas fa-sort ml-4"></i>
                                    <?php endif; ?>
                                </th>
                                <th style="cursor: pointer" wire:click="order('name')">
                                    Producto
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
                                <th style="cursor: pointer" wire:click="order('brand')">
                                    Marca
                                    <?php if($sort == 'brand'): ?>
                                        <?php if($direction == 'asc'): ?>
                                            <i class="fas fa-sort-up ml-4"></i>
                                        <?php else: ?>
                                            <i class="fas fa-sort-down ml-4"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fas fa-sort ml-4"></i>
                                    <?php endif; ?>
                                </th>
                                <th style="cursor: pointer" wire:click="order('quantity')">
                                    Cant.
                                    <?php if($sort == 'quantity'): ?>
                                        <?php if($direction == 'asc'): ?>
                                            <i class="fas fa-sort-up ml-4"></i>
                                        <?php else: ?>
                                            <i class="fas fa-sort-down ml-4"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fas fa-sort ml-4"></i>
                                    <?php endif; ?>
                                </th>
                                <th style="cursor: pointer" wire:click="order('cost')">
                                    Costo
                                    <?php if($sort == 'cost'): ?>
                                        <?php if($direction == 'asc'): ?>
                                            <i class="fas fa-sort-up ml-4"></i>
                                        <?php else: ?>
                                            <i class="fas fa-sort-down ml-4"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fas fa-sort ml-4"></i>
                                    <?php endif; ?>
                                </th>
                                <th style="cursor: pointer" wire:click="order('price')">
                                    Precio
                                    <?php if($sort == 'price'): ?>
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
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="<?php echo e($product->claseFila); ?>">
                                    <td class="align-middle" style="width: 100px; height=100px"><img class="img-fluid"
                                            src="<?php if($product->image): ?> <?php echo e(Storage::url($product->image->url)); ?> <?php else: ?> https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg <?php endif; ?>"
                                            alt="">
                                    </td>
                                    <td class="align-middle"><?php echo e($product->cod); ?></td>
                                    <td class="align-middle"><?php echo e($product->name); ?></td>
                                    <td class="align-middle"><?php echo e($product->brand); ?></td>
                                    <td class="align-middle"><?php echo e($product->quantity); ?></td>
                                    <td class="align-middle"><?php echo e($product->presentCost()); ?></td>
                                    <td class="align-middle"><?php echo e($product->presentPrice()); ?></td>

                                    <td class="align-middle text-right">
                                        <button wire:click="edit(<?php echo e($product->id); ?>)" data-toggle="modal"
                                            data-target=".UpdateWarehouse" class="btn btn-primary btn-sm mr-2"><i
                                                class="fas fa-edit fa-fw"></i></button>

                                        <a class="btn btn-danger btn-sm"
                                            wire:click="$emit('deleteProduct', <?php echo e($product->id); ?>, '<?php echo e($product->name); ?>')"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Cod.</th>
                                <th>Producto</th>
                                <th>Marca</th>
                                <th>Cant.</th>
                                <th>Costo</th>
                                <th>Precio</th>
                                <th>&nbsp;</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php if($products->hasPages()): ?>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <?php if($readyToLoad): ?>
                                <p>
                                    Mostrando registros del <?php echo e($recordRange['from']); ?> al <?php echo e($recordRange['to']); ?> de
                                    un total de <?php echo e($totalRecords); ?> registros.
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="d-flex justify-content-end"><?php echo e($products->links()); ?></div>
                        </div>
                    </div>

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

            Livewire.on('deleteProduct', (ProductId, ProductName) => {
                Swal.fire({
                    title: "Eliminar producto",
                    html: "<p>¿Está seguro que quiere eliminar el producto: <strong>" + ProductName +
                        "</strong>?</p><p>Ya no podrá utilizarlo para compras y ventas.</p>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "¡Si, Eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.stocktaking.products.show-products', 'delete', ProductId);
                    }
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/livewire/admin/stocktaking/products/show-products.blade.php ENDPATH**/ ?>