

<?php $__env->startSection('content'); ?>

<div class="container py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header text-white py-3"
             style="background:#e7a6b6;">

            <h4 class="mb-0">

                <i class="fas fa-pen-to-square"></i>
                Editar Especialista

            </h4>

        </div>

        <div class="card-body p-4">

            <?php if($errors->any()): ?>
            <div class="alert alert-danger rounded-4">
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('specialists.update',$specialist->id)); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-user"></i>
                        Nombre Completo

                    </label>

                    <input type="text"
                           name="name"
                           value="<?php echo e(old('name', $specialist->name)); ?>"
                           class="form-control form-control-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           required
                           maxlength="255"
                           pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                           title="Solo letras y espacios"
                           oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'')">

                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-spa"></i>
                        Especialidad

                    </label>

                    <input type="text"
                           name="specialty"
                           value="<?php echo e(old('specialty', $specialist->specialty)); ?>"
                           class="form-control form-control-lg <?php $__errorArgs = ['specialty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           required
                           maxlength="255">

                    <?php $__errorArgs = ['specialty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d;">

                    <i class="fas fa-floppy-disk"></i>
                    Actualizar

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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/specialists/edit.blade.php ENDPATH**/ ?>