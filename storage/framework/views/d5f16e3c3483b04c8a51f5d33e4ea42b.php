

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header text-white py-3"
             style="background:#6f7f5d;">

            <h4 class="mb-0">
                <i class="fas fa-user-plus"></i>
                Registrar Especialista
            </h4>

        </div>

        <div class="card-body p-4">

            <form action="<?php echo e(route('specialists.store')); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-user"></i>
                        Nombre Completo

                    </label>

                    <input type="text"
                           name="name"
                           class="form-control form-control-lg"
                           required>

                </div>

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-spa"></i>
                        Especialidad

                    </label>

                    <input type="text"
                           name="specialty"
                           class="form-control form-control-lg"
                           placeholder="Ej: Manicure y Pedicure"
                           required>

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d;">

                    <i class="fas fa-floppy-disk"></i>
                    Guardar

                </button>

                <a href="<?php echo e(route('specialists.index')); ?>"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Volver

                </a>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Aprendiz\Downloads\PROYECTO--main\resources\views/specialists/create.blade.php ENDPATH**/ ?>