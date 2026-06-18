@extends('layouts.app')

@section('content')

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

    <form method="POST"
          action="{{ route('profile.update') }}">

        @csrf
        @method('PATCH')

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
                       value="{{ old('name', $user->name) }}"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Apellido
                </label>

                <input type="text"
                       name="last_name"
                       value="{{ old('last_name', $user->last_name) }}"
                       class="form-control">

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Correo electrónico
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="form-control"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Teléfono
                </label>

                <input type="text"
                       name="phone"
                       value="{{ old('phone', $user->phone) }}"
                       class="form-control">

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
                   class="form-control">

        </div>

        <div class="mb-4">

            <label class="form-label">
                Confirmar contraseña
            </label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control">

        </div>

        <button type="submit"
                class="btn btn-spa">

            <i class="bi bi-check-circle-fill"></i>
            Guardar cambios

        </button>

    </form>

</div>
```

</div>

@endsection
