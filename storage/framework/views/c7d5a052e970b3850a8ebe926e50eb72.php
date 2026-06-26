

<?php $__env->startSection('content'); ?>

<div class="container py-5">

<h1 class="text-center fw-bold mb-5"
    style="color:#6f7f5d;">

    <i class="fas fa-chart-bar"></i>
    Reporte de Últimas Citas

</h1>

<div class="card border-0 shadow-lg"
     style="border-radius:25px;">

    <div class="card-header text-white"
         style="background:#8fae73;">

        <h4 class="mb-0">
            <i class="fas fa-calendar-check"></i>
            Historial de Citas Registradas
        </h4>

    </div>

    <div class="card-body">

        <?php if($citas->count() > 0): ?>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Especialista</th>
                        <th>Estado</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td>
                            <?php echo e($cita->id); ?>

                        </td>

                        <td>
                            <i class="fas fa-user me-2 text-success"></i>
                            <?php echo e($cita->user->name ?? 'Sin usuario'); ?>

                        </td>

                        <td>
                            <i class="fas fa-spa me-2 text-success"></i>
                            <?php echo e($cita->service->name ?? 'Sin servicio'); ?>

                        </td>

                        <td>
                            <?php echo e($cita->date); ?>

                        </td>

                        <td>
                            <?php echo e($cita->time); ?>

                        </td>

                        <td>
                            <i class="fas fa-user-nurse me-2 text-success"></i>
                            <?php echo e($cita->worker); ?>

                        </td>

                        <td>

                            <?php
                                $badgeClass = match($cita->status) {
                                    'confirmada' => 'badge-confirmada',
                                    'pendiente'  => 'badge-pendiente',
                                    default      => 'badge-cancelada',
                                };
                            ?>

                            <span class="<?php echo e($badgeClass); ?>">
                                <?php echo e($cita->status); ?>

                            </span>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

        <?php else: ?>

        <div class="alert alert-info text-center">

            <i class="fas fa-info-circle"></i>

            No hay citas registradas.

        </div>

        <?php endif; ?>

    </div>

</div>

<div class="text-center mt-4">

    <a href="<?php echo e(route('dashboard')); ?>"
       class="btn text-white"
       style="background:#6f7f5d;">

        <i class="fas fa-arrow-left"></i>
        Volver al Dashboard

    </a>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/reportes/citas.blade.php ENDPATH**/ ?>