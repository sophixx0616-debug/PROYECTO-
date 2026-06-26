

<?php $__env->startSection('content'); ?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

.profile-header{
    background:linear-gradient(
        135deg,
        #e7a6b6,
        #f1c7d2
    );
    color:white;
    border-radius:30px;
    padding:40px;
    text-align:center;
    box-shadow:0 10px 30px rgba(231,166,182,.25);
}

.profile-card{
    background:white;
    border-radius:30px;
    padding:35px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.profile-title{
    color:#6f7f5d;
    font-weight:700;
}

.btn-spa{
    background:#6f7f5d;
    color:white;
    border:none;
    border-radius:15px;
    padding:12px 30px;
    font-weight:600;
    transition:.3s;
}

.btn-spa:hover{
    background:#e7a6b6;
    color:white;
}

.form-control{
    border-radius:15px;
    padding:12px;
}

.section-title{
    color:#6f7f5d;
    font-weight:700;
}

</style>

<div class="container py-4">


<div class="profile-header mb-4">

    <i class="bi bi-person-circle"
       style="font-size:90px;">
    </i>

    <h1 class="mt-3">
        Mi Perfil
    </h1>

    <p class="mb-0">
        Administra tu información personal
    </p>

</div>

<div class="profile-card">

    <?php if($errors->any()): ?>
    <div class="alert alert-danger rounded-4">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="POST"
          action="<?php echo e(route('profile.update')); ?>">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>

        <h4 class="section-title mb-4">

            <i class="bi bi-person-fill"></i>
            Información Personal

        </h4>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Nombre
                </label>

                <input type="text"
                       name="name"
                       value="<?php echo e(old('name', $user->name)); ?>"
                       class="form-control <?php $__errorArgs = ['name'];
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
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Apellido
                </label>

                <input type="text"
                       name="last_name"
                       value="<?php echo e(old('last_name', $user->last_name)); ?>"
                       class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       maxlength="255"
                       pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                       title="Solo letras y espacios"
                       oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'')">

                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Correo electrónico
                </label>

                <input type="email"
                       name="email"
                       value="<?php echo e(old('email', $user->email)); ?>"
                       class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       required>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Teléfono
                </label>

                <input type="tel"
                       name="phone"
                       value="<?php echo e(old('phone', $user->phone)); ?>"
                       class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       pattern="[0-9]{7,15}"
                       maxlength="15"
                       title="Solo números, entre 7 y 15 dígitos"
                       oninput="this.value=this.value.replace(/[^0-9]/g,'')">

                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            </div>

        </div>

        <hr class="my-4">

        <h4 class="section-title mb-4">

            <i class="bi bi-shield-lock-fill"></i>
            Cambiar Contraseña

        </h4>

        <div class="mb-3">

            <label class="form-label">
                Nueva contraseña
            </label>

            <input type="password"
                   name="password"
                   class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   minlength="8">

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Confirmar contraseña
            </label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   minlength="8">

        </div>

        <button type="submit"
                class="btn btn-spa">

            <i class="bi bi-check-circle-fill"></i>
            Guardar cambios

        </button>

    </form>

</div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/profile/edit.blade.php ENDPATH**/ ?>