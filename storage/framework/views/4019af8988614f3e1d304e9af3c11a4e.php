

<?php $__env->startSection('content'); ?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="text-center fw-bold mb-5"
        style="color:#6f7f5d;font-size:50px;">

        <i class="bi bi-stars"></i>
        Nuevo Servicio

    </h1>

    <div class="row justify-content-center">

        <!-- TARJETA IZQUIERDA -->

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg"
                 style="border-radius:25px;">

                <div class="card-body text-center p-4">

                    <i class="bi bi-flower1"
                       style="
                        font-size:100px;
                        color:#e7a6b6;
                       ">
                    </i>

                    <h4 class="mt-3"
                        style="color:#6f7f5d;">

                        SPA LAS DIVINAS

                    </h4>

                    <p class="text-muted">

                        Registra nuevos servicios para tus clientes.

                    </p>

                </div>

            </div>

        </div>

        <!-- FORMULARIO -->

        <div class="col-md-8">

            <div class="card border-0 shadow-lg"
                 style="
                    border-radius:25px;
                    overflow:hidden;
                 ">

                <div class="card-header text-white py-3"
                     style="background:#8fae73;">

                    <h4 class="mb-0">

                        <i class="bi bi-journal-plus"></i>
                        Información del Servicio

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

                    <form action="<?php echo e(route('services.store')); ?>"
                          method="POST">

                        <?php echo csrf_field(); ?>

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Nombre del Servicio
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   value="<?php echo e(old('name')); ?>"
                                   required
                                   maxlength="255"
                                   pattern=".*\S.*">

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
                                Descripción
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control form-control-lg <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                      required><?php echo e(old('description')); ?></textarea>

                            <?php $__errorArgs = ['description'];
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

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="fw-bold mb-2">
                                    Precio
                                </label>

                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       name="price"
                                       class="form-control form-control-lg <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       value="<?php echo e(old('price')); ?>"
                                       required>

                                <?php $__errorArgs = ['price'];
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

                            <div class="col-md-6 mb-4">

                                <label class="fw-bold mb-2">
                                    Duración (minutos)
                                </label>

                                <input type="number"
                                       name="duration"
                                       min="1"
                                       max="480"
                                       value="<?php echo e(old('duration', '60')); ?>"
                                       class="form-control form-control-lg <?php $__errorArgs = ['duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       required>

                                <?php $__errorArgs = ['duration'];
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

                        </div>

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Estado
                            </label>

                            <select name="status"
                                    class="form-select form-select-lg <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

                                <option value="1" <?php echo e(old('status') == '1' ? 'selected' : ''); ?>>
                                    Activo
                                </option>

                                <option value="0" <?php echo e(old('status') == '0' ? 'selected' : ''); ?>>
                                    Inactivo
                                </option>

                            </select>

                            <?php $__errorArgs = ['status'];
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

                        <div class="d-flex gap-3">

                            <button type="submit"
                                    class="btn btn-lg text-white"
                                    style="
                                        background:#6f7f5d;
                                        border:none;
                                    ">

                                <i class="bi bi-check-circle-fill"></i>
                                Guardar Servicio

                            </button>

                            <a href="<?php echo e(route('services.index')); ?>"
                               class="btn btn-lg btn-outline-secondary">

                                <i class="bi bi-x-circle"></i>
                                Cancelar

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/services/create.blade.php ENDPATH**/ ?>