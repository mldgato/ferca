<div wire:init="loadProducts" wire:on="productAdded">

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <span class="text-primary"><i class="fas fa-toolbox"></i> Productos</span>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex justify-content-end">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.stocktaking.suppliers.create-product', ['supplier' => $supplier->id])->html();
} elseif ($_instance->childHasBeenRendered('l1179047856-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1179047856-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1179047856-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1179047856-0');
} else {
    $response = \Livewire\Livewire::mount('admin.stocktaking.suppliers.create-product', ['supplier' => $supplier->id]);
    $html = $response->html();
    $_instance->logRenderedChild('l1179047856-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <a href="<?php echo e(route('admin.stocktaking.buys.cart', $supplier->id)); ?>"
                            class="btn btn-outline-danger btn-lg ml-2">Compra <i
                                class="fas fa-shopping-basket"></i></a>
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
                                    <td class="align-middle" style="width: 89px; height=67px"><img class="img-fluid"
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
                                        <a href="<?php echo e(route('admin.stocktaking.buys.add_buy', $product->id)); ?>"
                                            class="btn btn-primary btn-sm mr-2" title="Agregar a la compra"><i
                                                class="fas fa-cart-plus"></i></a>
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
                    <div class="d-flex justify-content-end"><?php echo e($products->links()); ?></div>
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
        </script>
    <?php $__env->stopSection(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/livewire/admin/stocktaking/suppliers/show-producs.blade.php ENDPATH**/ ?>