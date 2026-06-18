@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">Editar Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Apellido</label>
                <input
                    type="text"
                    name="last_name"
                    class="form-control"
                    value="{{ old('last_name', $user->last_name) }}"
                    required>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Correo electrónico</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                    required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    value="{{ old('phone', $user->phone) }}"
                    required>
            </div>

        </div>

        <div class="mb-3">
            <label class="form-label">
                Contraseña (dejar en blanco para no cambiar)
            </label>

            <input
                type="password"
                name="password"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">
                Confirmar contraseña
            </label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Rol</label>

            <select name="role_id" class="form-select" required>

                @foreach($roles as $role)

                    <option
                        value="{{ $role->id }}"
                        {{ $user->role_id == $role->id ? 'selected' : '' }}>

                        {{ $role->name }}

                    </option>

                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

@endsection