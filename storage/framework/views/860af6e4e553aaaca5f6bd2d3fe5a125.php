

<?php $__env->startSection('content'); ?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

<h1 class="text-center fw-bold mb-5"
    style="color:#6f7f5d;font-size:50px;">
    <i class="bi bi-calendar-heart"></i>
    Mis Citas
</h1>

<div class="row">

    <div class="col-lg-8">

        <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="card border-0 shadow-sm mb-4"
             style="border-radius:25px;overflow:hidden;">

            <div class="card-header text-white"
                 style="background:#8fae73;">

                <h5 class="mb-0">
                    <i class="bi bi-stars"></i>
                    Cita Agendada
                </h5>

            </div>

            <div class="card-body p-4">

                <div class="row">

                    <div class="col-md-8">

                        <p>
                            <strong>Servicio:</strong>
                            <?php echo e($a->service->name); ?>

                        </p>

                        <p>
                            <strong>Fecha:</strong>
                            <?php echo e($a->date); ?>

                        </p>

                        <p>
                            <strong>Hora:</strong>
                            <?php echo e($a->time); ?>

                        </p>

                        <p>
                            <strong>Cliente:</strong>

                            <?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>
                                <?php echo e($a->user->name ?? 'Sin usuario'); ?>

                            <?php else: ?>
                                <?php echo e(auth()->user()->name); ?>

                            <?php endif; ?>
                        </p>

                        <p>
                            <strong>Especialista:</strong>

                            <span class="fw-bold" style="color:#8fae73;">
                                <i class="bi bi-person-heart"></i>
                                <?php echo e($a->worker); ?>

                            </span>
                        </p>

                        <?php
                            $badgeClass = match($a->status) {
                                'confirmada' => 'badge-confirmada',
                                'pendiente'  => 'badge-pendiente',
                                default      => 'badge-cancelada',
                            };
                        ?>

                        <span class="<?php echo e($badgeClass); ?>" style="font-size:15px;">
                            <?php echo e($a->status); ?>

                        </span>

                        <div class="mt-3 d-flex gap-2 flex-wrap">

                            <?php if(auth()->user()->role && auth()->user()->role->name === 'admin'): ?>

                                <?php if($a->status !== 'pendiente'): ?>
                                <form action="<?php echo e(route('appointments.status', $a->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status" value="pendiente">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="Swal.fire({icon:'question',title:'¿Marcar como Pendiente?',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí',cancelButtonText:'No',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-clock"></i> Pendiente
                                    </button>
                                </form>
                                <?php endif; ?>

                                <?php if($a->status !== 'confirmada'): ?>
                                <form action="<?php echo e(route('appointments.status', $a->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status" value="confirmada">
                                    <button type="button" class="btn btn-outline-success"
                                        onclick="Swal.fire({icon:'question',title:'¿Confirmar cita?',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí',cancelButtonText:'No',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-check-circle"></i> Confirmar
                                    </button>
                                </form>
                                <?php endif; ?>

                                <?php if($a->status !== 'cancelada'): ?>
                                <form action="<?php echo e(route('appointments.status', $a->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status" value="cancelada">
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="Swal.fire({icon:'warning',title:'¿Cancelar cita?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, cancelar',cancelButtonText:'Volver',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </button>
                                </form>
                                <?php endif; ?>

                                <a href="<?php echo e(route('appointments.edit', $a->id)); ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <form action="<?php echo e(route('appointments.destroy', $a->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-danger"
                                        onclick="Swal.fire({icon:'warning',title:'¿Eliminar cita?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>

                            <?php else: ?>

                                <?php if($a->status !== 'cancelada'): ?>
                                <form action="<?php echo e(route('appointments.status', $a->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="status" value="cancelada">
                                    <button type="button" class="btn btn-outline-danger"
                                        onclick="Swal.fire({icon:'warning',title:'¿Cancelar cita?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, cancelar',cancelButtonText:'Volver',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">
                                        <i class="bi bi-x-circle"></i> Cancelar
                                    </button>
                                </form>
                                <?php endif; ?>

                                <a href="<?php echo e(route('appointments.edit', $a->id)); ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                            <?php endif; ?>

                        </div>

                    </div>

                    <div class="col-md-4 text-center">

                        <i class="bi bi-heart-fill"
                           style="font-size:70px;color:#e7a6b6;">
                        </i>

                        <h6 class="mt-3 fw-bold"
                            style="color:#6f7f5d;">
                            LAS DIVINAS SPA
                        </h6>

                    </div>

                </div>

            </div>

        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <div class="alert text-center"
             style="background:#fdf1f4;border:none;color:#6f7f5d;">

            <i class="bi bi-calendar-x fs-3"></i>

            <h5 class="mt-2">
                No tienes citas registradas
            </h5>

        </div>

        <?php endif; ?>

    </div>

    <div class="col-lg-4">

        <div class="card border-0 shadow-sm"
             style="border-radius:25px;">

            <div class="card-body text-center">

                <i class="bi bi-calendar3"
                   style="font-size:60px;color:#8fae73;">
                </i>

                <h4 class="mt-3"
                    style="color:#6f7f5d;">
                    Calendario
                </h4>

                <input type="date"
                       class="form-control mt-3">

            </div>

        </div>

        <a href="<?php echo e(route('appointments.create')); ?>"
           class="btn w-100 mt-4 text-white py-3"
           style="
                background:#8fae73;
                border:none;
                border-radius:15px;
                font-weight:600;
           ">

            <i class="bi bi-plus-circle"></i>
            Nueva Cita

        </a>

    </div>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/appointments/index.blade.php ENDPATH**/ ?>