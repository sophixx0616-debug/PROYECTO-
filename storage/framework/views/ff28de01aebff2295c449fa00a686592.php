<nav class="navbar navbar-expand-lg navbar-light navbar-divinas">
    <div class="container">

        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            SPA LAS DIVINAS
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>
        <style>
            /* NAVBAR LAS DIVINAS */

.navbar-divinas{
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    margin: 20px auto;
    padding: 12px 25px;
    box-shadow: 0 5px 20px rgba(0,0,0,.08);
}

.navbar-brand{
    color: #6f7f5d !important;
    font-size: 28px;
    font-weight: 700;
}

.navbar-brand:hover{
    color: #e7a6b6 !important;
}

.nav-link{
    color: #5f6f52 !important;
    font-weight: 500;
    margin: 0 8px;
    transition: .3s;
}

.nav-link:hover{
    color: #e7a6b6 !important;
}

.nav-link i{
    margin-right: 8px;
}

.btn-logout{
    background: none;
    border: none;
    color: #5f6f52;
    font-weight: 500;
    transition: .3s;
}

.btn-logout:hover{
    color: #e7a6b6;
}

.navbar-toggler{
    border: none;
}

.navbar-toggler:focus{
    box-shadow: none;
}
            </style>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                <?php if(auth()->guard()->check()): ?>

                    
                    <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
        <i class="fas fa-chart-line"></i> Dashboard
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('profile.edit')); ?>">
        <i class="fas fa-user"></i> Mi Perfil
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('appointments.index')); ?>">
        <i class="fas fa-calendar-check"></i> Mis Citas
    </a>
</li>

<li class="nav-item position-relative">
    <a class="nav-link" href="<?php echo e(route('cart.index')); ?>">
        <i class="fas fa-shopping-bag"></i> Bolsa
        <?php if(session('cart') && count(session('cart')) > 0): ?>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:0.6rem;">
                <?php echo e(count(session('cart'))); ?>

            </span>
        <?php endif; ?>
    </a>
</li>

                    
                    <?php if(Auth::user()->role && Auth::user()->role->name === 'admin'): ?>
<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
        <i class="fas fa-users"></i> Usuarios
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('services.index')); ?>">
        <i class="fas fa-spa"></i> Servicios
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('specialists.index')); ?>">
        <i class="fas fa-user-tie"></i> Especialistas
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('inventory.index')); ?>">
        <i class="fas fa-box"></i> Inventario
    </a>
</li>
                    <?php endif; ?>

                    <li class="nav-item">
    <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form">
        <?php echo csrf_field(); ?>
        <button type="button" class="btn-logout nav-link" onclick="confirmLogout()">
            <i class="fas fa-sign-out-alt"></i> Salir
        </button>
    </form>
</li>

                <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">
                            Ingresar
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('register')); ?>">
                            Registrarse
                        </a>
                    </li>

                <?php endif; ?>

            </ul>

        </div>

    </div>
</nav><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>