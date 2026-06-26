

<?php $__env->startSection('content'); ?>

<div class="container py-4">


<h1 class="text-center mb-4"
    style="color:#6f7f5d;">

    <i class="bi bi-cash-stack"></i>
    Reporte de Ingresos Estimados

</h1>

<div class="row">

    <div class="col-md-4">

        <div class="card border-0 shadow-lg">

            <div class="card-body text-center">

                <i class="bi bi-currency-dollar"
                   style="font-size:60px;color:#198754;">
                </i>

                <h5 class="mt-3">
                    Ingresos Totales
                </h5>

                <h2 class="fw-bold text-success">

                    $<?php echo e(number_format($ingresos, 0, ',', '.')); ?>


                </h2>

            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card border-0 shadow-lg">

            <div class="card-header text-white"
                 style="background:#6f7f5d;">

                Servicios Facturados

            </div>

            <div class="card-body">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th>Servicio</th>
                            <th>Precio</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td>
                                <?php echo e($cita->service->name ?? 'N/A'); ?>

                            </td>

                            <td>

                                $<?php echo e(number_format($cita->service->price ?? 0, 0, ',', '.')); ?>


                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>

            </div>

        </div>

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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/reportes/ingresos.blade.php ENDPATH**/ ?>