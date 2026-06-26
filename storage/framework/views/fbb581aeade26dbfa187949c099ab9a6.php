<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<h2 class="mb-4 text-center">Iniciar Sesión</h2>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
<ul class="mb-0">
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
<form method="POST" action="<?php echo e(route('login')); ?>">
<?php echo csrf_field(); ?>
<div class="mb-3">
<label for="email" class="form-label">Correo electrónico</label>
<input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
</div>
<div class="mb-3">
<label for="password" class="form-label">Contraseña</label>
<input id="password" type="password" class="form-control" name="password"
required>
</div>
<div class="mb-3 form-check">
<input type="checkbox" class="form-check-input" name="remember" id="remember">
<label class="form-check-label" for="remember">Recordarme</label>
</div>
<button type="submit" class="btn btn-primary w-100">Ingresar</button>
</form>

<div class="mt-3 text-center">
<span>¿No tienes cuenta?</span>
<a href="<?php echo e(route('register')); ?>">Regístrate aquí</a>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/auth/login.blade.php ENDPATH**/ ?>