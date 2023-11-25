<div>
    <div class="card mb-3">
        <div class="card-header">
            <form wire:submit.prevent="generateReport">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="startDate">Fecha de Inicio:</label>
                            <input type="date" class="form-control" wire:model.defer="startDate" id="startDate">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="endDate">Fecha de Fin:</label>
                            <input type="date" class="form-control" wire:model.defer="endDate" id="endDate">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 d-flex align-items-center mt-3">
                        <button type="submit" class="btn btn-primary">Generar Reporte</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <?php if($sales): ?>
                <h3>Reporte de Ventas</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Venta</th>
                            <th>Vendedor</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <!-- ... otras columnas ... -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sale->id); ?></td>
                                <td><?php echo e($sale->name); ?></td>
                                <td><?php echo e($sale->date); ?></td>
                                <td>Q. <?php echo e(number_format($sale->total, 2, '.', ',')); ?></td>
                                <!-- ... otras columnas ... -->
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right"><strong>Total General:</strong></th>
                            <th><strong>Q. <?php echo e(number_format($sales->sum('total'), 2, '.', ',')); ?></strong></th>
                        </tr>
                    </tfoot>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\ferca\resources\views/livewire/admin/shop/sales/sales-list.blade.php ENDPATH**/ ?>