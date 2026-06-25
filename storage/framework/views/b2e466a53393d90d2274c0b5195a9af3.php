

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 style="color:#6f7f5d;font-weight:700;">
            <i class="fas fa-user-nurse me-2"></i>
            Gestión de Especialistas
        </h1>

        <a href="<?php echo e(route('specialists.create')); ?>"
           class="btn text-white"
           style="background:#6f7f5d;border-radius:12px;">

            <i class="fas fa-circle-plus"></i>
            Nueva Especialista

        </a>

    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success rounded-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-spa"></i> Especialidad</th>
                        <th class="text-center">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <i class="fas fa-user-nurse text-success me-2"></i>
                            <?php echo e($specialist->name); ?>

                        </td>

                        <td>
                            <i class="fas fa-wand-magic-sparkles me-2"
                               style="color:#e7a6b6;"></i>
                            <?php echo e($specialist->specialty); ?>

                        </td>

                        <td class="text-center">

                            <a href="<?php echo e(route('specialists.edit',$specialist->id)); ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-pen-to-square"></i>

                            </a>

                            <form action="<?php echo e(route('specialists.destroy',$specialist->id)); ?>"
                                  method="POST"
                                  class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash-can"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="3" class="text-center py-4">

                            <i class="fas fa-user-slash fa-2x mb-3"
                               style="color:#e7a6b6;"></i>

                            <p>No hay especialistas registradas.</p>

                        </td>

                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\xampp\PROYECTO--main\resources\views/specialists/index.blade.php ENDPATH**/ ?>