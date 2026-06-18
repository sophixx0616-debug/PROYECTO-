<?php $__env->startSection('content'); ?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

```
<div class="d-flex justify-content-between align-items-center mb-5">

    <div>

        <h1 class="fw-bold"
            style="color:#6f7f5d;">

            <i class="bi bi-box-seam-fill"></i>
            Inventario

        </h1>

        <p class="text-muted">
            Productos registrados: <?php echo e($items->count()); ?>

        </p>

    </div>

    <a href="<?php echo e(route('inventory.create')); ?>"
       class="btn text-white px-4 py-2"
       style="
            background:#6f7f5d;
            border:none;
            border-radius:15px;
       ">

        <i class="bi bi-plus-circle-fill"></i>
        Nuevo Producto

    </a>

</div>

<?php if($items->where('quantity','<=',3)->count()): ?>

    <div class="alert alert-warning">

        <i class="bi bi-exclamation-triangle-fill"></i>

        Hay productos con stock bajo.

    </div>

<?php endif; ?>

<?php if(session('success')): ?>

    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>

<?php endif; ?>

<div class="row">

    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <div class="col-md-4 mb-4">

        <div class="card border-0 shadow-sm h-100"
             style="border-radius:25px;">

            <div class="text-center py-4"
                 style="background:#fdf1f4;">

                <i class="bi bi-box-seam"
                   style="
                        font-size:80px;
                        color:#e7a6b6;
                   ">
                </i>

            </div>

            <div class="card-body">

                <h4 class="fw-bold"
                    style="color:#6f7f5d;">

                    <?php echo e($item->product_name); ?>


                </h4>

                <p>

                    <strong>Precio:</strong>

                    $<?php echo e(number_format($item->price,2)); ?>


                </p>

                <p>

                    <strong>Existencias:</strong>

                    <?php if($item->quantity <= 3): ?>

                        <span class="badge bg-danger">
                            <?php echo e($item->quantity); ?>

                        </span>

                    <?php elseif($item->quantity <= 10): ?>

                        <span class="badge bg-warning text-dark">
                            <?php echo e($item->quantity); ?>

                        </span>

                    <?php else: ?>

                        <span class="badge bg-success">
                            <?php echo e($item->quantity); ?>

                        </span>

                    <?php endif; ?>

                </p>

                <?php if($item->quantity <= 3): ?>

                    <div class="alert alert-danger py-2">

                        <i class="bi bi-exclamation-triangle-fill"></i>

                        Stock bajo

                    </div>

                <?php endif; ?>

            </div>

            <div class="card-footer bg-white border-0 pb-4">

                <a href="<?php echo e(route('inventory.edit',$item->id)); ?>"
                   class="btn btn-warning">

                    <i class="bi bi-pencil-fill"></i>

                </a>

                <form action="<?php echo e(route('inventory.destroy',$item->id)); ?>"
                      method="POST"
                      style="display:inline-block;">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('¿Eliminar producto?')">

                        <i class="bi bi-trash-fill"></i>

                    </button>

                </form>

            </div>

        </div>

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <div class="col-12">

        <div class="alert text-center"
             style="
                background:#fdf1f4;
                color:#6f7f5d;
             ">

            <i class="bi bi-box-seam fs-1"></i>

            <h4 class="mt-3">
                No hay productos registrados
            </h4>

        </div>

    </div>

    <?php endif; ?>

</div>
```

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aprendiz\Downloads\PROYECTO--main\resources\views/inventory/index.blade.php ENDPATH**/ ?>