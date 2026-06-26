

<?php $__env->startSection('content'); ?>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold" style="color:#6f7f5d;">
                <i class="bi bi-people-fill"></i>
                Gestión de Usuarios
            </h1>

            <p class="text-muted">
                Total registrados: <?php echo e($users->count()); ?>

            </p>
        </div>

        <a href="<?php echo e(route('users.create')); ?>"
           class="btn text-white"
           style="background:#6f7f5d;border:none;">

            <i class="bi bi-person-plus-fill"></i>
            Nuevo Usuario

        </a>

    </div>

    <?php if(session('success')): ?>

        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>

    <?php endif; ?>

    <!-- BUSCADOR -->

    <div class="card border-0 shadow-sm mb-4"
         style="border-radius:20px;">

        <div class="card-body">

            <input type="text"
                   id="buscarUsuario"
                   class="form-control"
                   placeholder="Buscar usuario por nombre o correo...">

        </div>

    </div>

    <!-- TABLA -->

    <div class="card border-0 shadow-sm"
         style="border-radius:20px;overflow:hidden;">

        <div class="card-header text-white"
             style="background:#e7a6b6;">

            <h5 class="mb-0">
                Lista de Usuarios
            </h5>

        </div>

        <div class="table-responsive">

            <table class="table table-hover mb-0"
                   id="tablaUsuarios">

                <thead style="background:#fdf1f4;">

                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th width="180">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>

                        <td><?php echo e($user->id); ?></td>

                        <td><?php echo e($user->name); ?></td>

                        <td><?php echo e($user->email); ?></td>

                        <td>

                            <span class="badge"
                                  style="background:#6f7f5d;">

                                <?php echo e($user->role->name ?? 'Sin rol'); ?>


                            </span>

                        </td>

                        <td>

                            <a href="<?php echo e(route('users.edit', $user)); ?>"
                               class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            <form action="<?php echo e(route('users.destroy', $user)); ?>"
                                  method="POST"
                                  style="display:inline-block;">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault(); Swal.fire({icon:'warning',title:'¿Eliminar usuario?',text:'Esta acción no se puede deshacer.',showCancelButton:true,confirmButtonColor:'#6f7f5d',cancelButtonColor:'#dc3545',confirmButtonText:'Sí, eliminar',cancelButtonText:'Cancelar',customClass:{popup:'rounded-4'}}).then((r)=>{if(r.isConfirmed) this.closest('form').submit()})">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script>

document.getElementById('buscarUsuario').addEventListener('keyup', function(){

    let filtro = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaUsuarios tbody tr');

    filas.forEach(function(fila){

        let texto = fila.innerText.toLowerCase();

        fila.style.display =
            texto.includes(filtro)
            ? ''
            : 'none';

    });

});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/users/index.blade.php ENDPATH**/ ?>