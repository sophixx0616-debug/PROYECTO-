<x-guest-layout>

<h2 class="mb-4 text-center">Registro</h2>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Nombre -->
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input id="name" type="text" class="form-control" name="name"
            value="{{ old('name') }}" required autofocus>
    </div>

    <!-- Apellido -->
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input id="apellido" type="text" class="form-control" name="apellido"
            value="{{ old('apellido') }}" required>
    </div>

    <!-- Teléfono -->
    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input id="telefono" type="text" class="form-control" name="telefono"
            value="{{ old('telefono') }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input id="email" type="email" class="form-control" name="email"
            value="{{ old('email') }}" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" class="form-control"
            name="password" required>
    </div>

    <!-- Confirmar -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
        <input id="password_confirmation" type="password" class="form-control"
            name="password_confirmation" required>
    </div>

    <!-- Botón -->
    <button type="submit" class="btn-divinas">
    Registrarme
</button>
    </div>

</form>

</x-guest-layout>