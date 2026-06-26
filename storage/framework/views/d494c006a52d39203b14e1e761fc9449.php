<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<title>Las Divinas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    font-family:'Poppins',sans-serif;
    background:#fdf8f8;
    min-height:100vh;
}

.auth-container{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:40px 20px;
}

.auth-card{
    background:white;
    border-radius:30px;
    overflow:hidden;
    box-shadow:0 10px 35px rgba(0,0,0,.08);
    max-width:1100px;
    width:100%;
}

.auth-image{
    background:#f7e7ec;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.auth-image img{
    width:100%;
    max-width:420px;
    border-radius:25px;
}

.auth-form{
    padding:50px;
}

.brand-title{
    color:#6f7f5d;
    font-size:3rem;
    font-weight:700;
    text-align:center;
}

.brand-subtitle{
    color:#d99bab;
    text-align:center;
    margin-bottom:30px;
}

.form-control{
    border-radius:15px;
    padding:14px;
}

.btn-divinas{
    background:#6f7f5d;
    color:white;
    border:none;
    border-radius:15px;
    padding:14px;
    width:100%;
    font-weight:600;
}

.btn-divinas:hover{
    background:#59694a;
}

</style>

</head>

<body>

<div class="auth-container">

<div class="auth-card">

<div class="row g-0">

<div class="col-md-5 auth-image">

<img src="<?php echo e(asset('img/register.jpg')); ?>" alt="Las Divinas">

</div>

<div class="col-md-7 auth-form">

<h1 class="brand-title">
    Las Divinas
</h1>

<p class="brand-subtitle">
    Crea tu cuenta y disfruta nuestros servicios
</p>

<?php echo e($slot); ?>


</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html><?php /**PATH C:\Users\danna\OneDrive\Documentos\GitHub\PROYECTO-NUEVO\resources\views/layouts/guest.blade.php ENDPATH**/ ?>