

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <h1 class="text-center mb-4"
        style="color:#6f7f5d;">

        <i class="bi bi-person-heart"></i>
        Especialistas Más Solicitadas

    </h1>

    <div class="card border-0 shadow">

        <div class="card-body">

            <table class="table table-hover">

                <thead>

                    <tr>
                        <th>Ranking</th>
                        <th>Especialista</th>
                        <th>Total Citas</th>
                    </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $especialistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $especialista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            #<?php echo e($index + 1); ?>

                        </td>

                        <td>
                            <?php echo e($especialista->worker); ?>

                        </td>

                        <td>

                            <span class="badge bg-success">

                                <?php echo e($especialista->total); ?>


                            </span>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="3" class="text-center">

                            No hay citas registradas.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/reportes/especialistas.blade.php ENDPATH**/ ?>