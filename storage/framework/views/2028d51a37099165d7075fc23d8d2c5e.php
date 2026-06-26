

<?php $__env->startSection('content'); ?>

<div class="container py-4">


<h1 class="text-center mb-4"
    style="color:#6f7f5d;">

    <i class="bi bi-exclamation-triangle-fill"></i>
    Reporte de Inventario Bajo

</h1>

<div class="card border-0 shadow-lg">

    <div class="card-header text-white"
         style="background:#dc3545;">

        <h4 class="mb-0">

            <i class="bi bi-box-seam"></i>
            Productos Próximos a Agotarse

        </h4>

    </div>

    <div class="card-body">

        <?php if($productos->count()): ?>

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                </tr>

            </thead>

            <tbody>

            <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td><?php echo e($producto->id); ?></td>

                    <td><?php echo e($producto->product_name); ?></td>

                    <td><?php echo e($producto->stock); ?></td>

                    <td>

                        <span class="badge bg-danger">

                            Stock Bajo

                        </span>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

        <?php else: ?>

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill"></i>

            Excelente. No hay productos con inventario bajo.

        </div>

        <?php endif; ?>

    </div>

</div>

<div class="mt-4">

    <a href="<?php echo e(route('dashboard')); ?>"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Volver al Dashboard

    </a>

</div>


</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/reportes/inventario-bajo.blade.php ENDPATH**/ ?>