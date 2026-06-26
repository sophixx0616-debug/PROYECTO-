

<?php $__env->startSection('content'); ?>

<div class="container py-5">

<h1 class="text-center fw-bold mb-5"
    style="color:#6f7f5d;">

    <i class="bi bi-pencil-square"></i>
    Editar Cita

</h1>

<div class="card border-0 shadow-lg"
     style="border-radius:25px;">

    <div class="card-body p-4">

        <form action="<?php echo e(route('appointments.update', $appointment->id)); ?>"
              method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Servicio
                </label>

                <select name="service_id"
                        class="form-select"
                        required>

                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($service->id); ?>"
                        <?php echo e($appointment->service_id == $service->id ? 'selected' : ''); ?>>

                            <?php echo e($service->name); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Fecha
                </label>

                <input type="date"
                       name="date"
                       class="form-control"
                       value="<?php echo e($appointment->date); ?>"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Hora
                </label>

                <input type="time"
                       name="time"
                       class="form-control"
                       value="<?php echo e($appointment->time); ?>"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label fw-bold">
                    Especialista
                </label>

                <select name="worker"
                        class="form-select"
                        required>

                    <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($specialist->name); ?>"
                        <?php echo e($appointment->worker == $specialist->name ? 'selected' : ''); ?>>

                            <?php echo e($specialist->name); ?>

                            - <?php echo e($specialist->specialty); ?>


                        </option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            </div>

            <?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>

            <div class="mb-4">

                <label class="form-label fw-bold">
                    Estado
                </label>

                <select name="status"
                        class="form-select">

                    <option value="pendiente"
                    <?php echo e($appointment->status == 'pendiente' ? 'selected' : ''); ?>>
                        Pendiente
                    </option>

                    <option value="confirmada"
                    <?php echo e($appointment->status == 'confirmada' ? 'selected' : ''); ?>>
                        Confirmada
                    </option>

                    <option value="cancelada"
                    <?php echo e($appointment->status == 'cancelada' ? 'selected' : ''); ?>>
                        Cancelada
                    </option>

                </select>

            </div>

            <?php endif; ?>

            <button type="submit"
                    class="btn text-white"
                    style="background:#8fae73;">

                <i class="bi bi-check-circle"></i>
                Guardar Cambios

            </button>

            <a href="<?php echo e(route('appointments.index')); ?>"
               class="btn btn-secondary">

                Cancelar

            </a>

        </form>

    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/appointments/edit.blade.php ENDPATH**/ ?>