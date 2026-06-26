

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <h1 class="mb-4 text-center"
        style="color:#6f7f5d;">

        <i class="bi bi-stars"></i>
        Servicios Más Solicitados

    </h1>

    <div class="card shadow border-0">

        <div class="card-body">

            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Servicio</th>
                        <th>Total Reservas</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td><?php echo e($index + 1); ?></td>

                        <td>
                            <?php echo e($servicio->service->name ?? 'N/A'); ?>

                        </td>

                        <td>

                            <span class="badge bg-success">
                                <?php echo e($servicio->total); ?>

                            </span>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        <a href="<?php echo e(route('dashboard')); ?>"
           class="btn btn-secondary">

            Volver

        </a>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/reportes/servicios.blade.php ENDPATH**/ ?>