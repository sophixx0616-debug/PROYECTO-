@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
    background:linear-gradient(to bottom,#ffffff,#fdf1f4);
}

.card-premium{
    border:none;
    border-radius:25px;
    overflow:hidden;
}

.btn-spa{
    background:#6f7f5d;
    color:white;
    border:none;
    border-radius:15px;
}

.btn-spa:hover{
    background:#5d6d4c;
    color:white;
}

.titulo{
    color:#6f7f5d;
    font-size:50px;
    font-weight:bold;
}

.imagen-preview{
    width:100%;
    max-height:250px;
    object-fit:cover;
    border-radius:20px;
    border:3px solid #f3d8df;
}

</style>

<div class="container py-5">

<div class="text-center mb-5">

<h1 class="titulo">

<i class="bi bi-pencil-square"></i>

Editar Servicio

</h1>

</div>

<div class="row justify-content-center">

<div class="col-lg-4 mb-4">

<div class="card shadow-lg card-premium">

<div class="card-body text-center">

@if($service->image)

<img
src="{{ asset('storage/'.$service->image) }}"
class="imagen-preview mb-4">

@else

<i class="bi bi-flower1"
style="font-size:120px;color:#e7a6b6;"></i>

@endif

<h3
style="color:#6f7f5d;"
class="fw-bold">

{{ $service->name }}

</h3>

<p class="text-muted">

Modifica la información del servicio.

</p>

</div>

</div>

</div>

<div class="col-lg-8">

<div class="card shadow-lg card-premium">

<div class="card-header text-white"
style="background:#8fae73;">

<h4 class="mb-0">

<i class="bi bi-pencil-fill"></i>

Actualizar Información

</h4>

</div>

<div class="card-body">

<form
action="{{ route('services.update',$service) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')
<div class="mb-4">

    <label class="fw-bold mb-2">
        Nombre del Servicio
    </label>

    <input
        type="text"
        name="name"
        class="form-control form-control-lg"
        value="{{ old('name',$service->name) }}"
        required>

</div>

<div class="mb-4">

    <label class="fw-bold mb-2">
        Descripción
    </label>

    <textarea
        name="description"
        rows="4"
        class="form-control"
        required>{{ old('description',$service->description) }}</textarea>

</div>

<div class="row">

    <div class="col-md-6 mb-4">

        <label class="fw-bold mb-2">
            Precio
        </label>

        <input
            type="number"
            step="0.01"
            name="price"
            class="form-control form-control-lg"
            value="{{ old('price',$service->price) }}"
            required>

    </div>

    <div class="col-md-6 mb-4">

        <label class="fw-bold mb-2">
            Duración (minutos)
        </label>

        <input
            type="number"
            name="duration"
            class="form-control form-control-lg"
            value="{{ old('duration',$service->duration) }}"
            required>

    </div>

</div>

<div class="mb-4">

    <label class="fw-bold mb-2">
        Estado
    </label>

    <select
        name="status"
        class="form-select form-select-lg">

        <option value="1"
            {{ $service->status ? 'selected' : '' }}>
            Activo
        </option>

        <option value="0"
            {{ !$service->status ? 'selected' : '' }}>
            Inactivo
        </option>

    </select>

</div>

<div class="mb-4">

    <label class="fw-bold mb-2">
        Imagen del Servicio
    </label>

    @if($service->image)

        <div class="mb-3">

            <img
                src="{{ asset('storage/'.$service->image) }}"
                class="img-fluid rounded shadow"
                style="max-width:250px;">

        </div>
        @if($service->image)

    <div class="form-check mb-3">
        <input class="form-check-input"
               type="checkbox"
               name="remove_image"
               value="1"
               id="remove_image">

        <label class="form-check-label" for="remove_image">
            Eliminar imagen actual
        </label>
    </div>

@endif

    @endif

    <input
        type="file"
        name="image"
        class="form-control"
        accept="image/png,image/jpeg,image/jpg">

    <small class="text-muted">
        Si no deseas cambiar la imagen, deja este campo vacío.
    </small>

</div>
<div class="d-flex gap-3 mt-4">

    <button
        type="submit"
        class="btn btn-lg btn-spa">

        <i class="bi bi-check-circle-fill"></i>

        Guardar Cambios

    </button>

    <a
        href="{{ route('services.index') }}"
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

@endsection