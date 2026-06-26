<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Las Divinas Nails Spa</title>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body{
            background:#fdf8f8;
            min-height:100vh;
        }
        .is-invalid{
            border-color:#dc3545 !important;
            box-shadow:0 0 0 0.2rem rgba(220,53,69,.25) !important;
        }
        .invalid-feedback{
            color:#dc3545;
            font-size:0.875em;
            margin-top:0.25rem;
        }
    </style>

</head>

<body>

    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '<?php echo e(session('success')); ?>',
                confirmButtonColor: '#6f7f5d',
                timer: 3000,
                timerProgressBar: true,
                customClass: { popup: 'rounded-4' }
            });
        <?php endif; ?>
        <?php if(session('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo e(session('error')); ?>',
                confirmButtonColor: '#6f7f5d',
                timer: 3000,
                timerProgressBar: true,
                customClass: { popup: 'rounded-4' }
            });
        <?php endif; ?>
        <?php if(session('warning')): ?>
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: '<?php echo e(session('warning')); ?>',
                confirmButtonColor: '#6f7f5d',
                customClass: { popup: 'rounded-4' }
            });
        <?php endif; ?>
        <?php if(session('info')): ?>
            Swal.fire({
                icon: 'info',
                title: 'Información',
                text: '<?php echo e(session('info')); ?>',
                confirmButtonColor: '#6f7f5d',
                customClass: { popup: 'rounded-4' }
            });
        <?php endif; ?>
    });

    function confirmLogout() {
        Swal.fire({
            icon: 'question',
            title: '¿Cerrar sesión?',
            text: 'Estás a punto de salir del sistema.',
            showCancelButton: true,
            confirmButtonColor: '#6f7f5d',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Sí, salir',
            cancelButtonText: 'Cancelar',
            customClass: { popup: 'rounded-4' }
        }).then((r) => {
            if (r.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
    </script>

</body>
</html>
<?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/layouts/app.blade.php ENDPATH**/ ?>