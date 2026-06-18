@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="text-center fw-bold mb-5"
        style="color:#6f7f5d;font-size:50px;">

        <i class="bi bi-pencil-square"></i>
        Editar Servicio

    </h1>

    <div class="row justify-content-center">

        <!-- TARJETA -->

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg"
                 style="border-radius:25px;">

                <div class="card-body text-center p-4">

                    <i class="bi bi-stars"
                       style="
                        font-size:100px;
                        color:#e7a6b6;
                       ">
                    </i>

                    <h4 class="mt-3"
                        style="color:#6f7f5d;">

                        {{ $service->name }}

                    </h4>

                    <p class="text-muted">

                        Modifica la información del servicio.

                    </p>

                </div>

            </div>

        </div>

        <!-- FORMULARIO -->

        <div class="col-md-8">

            <div class="card border-0 shadow-lg"
                 style="
                    border-radius:25px;
                    overflow:hidden;
                 ">

                <div class="card-header text-white py-3"
                     style="background:#8fae73;">

                    <h4 class="mb-0">

                        <i class="bi bi-pencil-fill"></i>
                        Actualizar Servicio

                    </h4>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('services.update', $service) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Nombre del Servicio
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   value="{{ old('name', $service->name) }}"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Descripción
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control">{{ old('description', $service->description) }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">
@extends('layouts.app')

@section('content')

<!-- Fuentes y Estilos Premium -->
<link href="https://googleapis.com" rel="stylesheet">
<link rel="stylesheet" href="https://jsdelivr.net">

<style>
    body {
        background: linear-gradient(to bottom, #ffffff, #fdf1f4);
        font-family: 'Poppins', sans-serif;
    }
    .fuente-elegante {
        font-family: 'Playfair Display', serif;
        font-style: italic;
        color: #6f7f5d;
    }
    .card-premium {
        border: none;
        border-radius: 25px;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.9);
    }
    .form-control-premium {
        border-radius: 12px;
        border: 1px solid #eee;
        padding: 12px;
    }
</style>

<div class="container py-5">

    <h1 class="text-center fuente-elegante mb-5" style="font-size: 50px;">
        <i class="bi bi-pencil-square"></i>
        Editar Servicio
    </h1>

    <div class="row justify-content-center">

        <!-- TARJETA DE PREVISUALIZACIÓN (Estilo ellas + tu elegancia) -->
        <div class="col-md-4 mb-4">

            <div class="card card-premium shadow-lg border-0">

                <div class="card-body text-center p-5">

                    <i class="bi bi-gem" style="font-size: 80px; color: #e7a6b6;"></i>

                    <h4 class="fuente-elegante mt-4">
                        {{ $service->name }}
                    </h4>

                    <p class="text-muted small">
                        Personaliza los detalles de esta experiencia de belleza.
                    </p>

                    <div class="mt-4 pt-3 border-top text-muted">
                        <small>Última actualización: {{ $service->updated_at->format('d/m/Y') }}</small>
                    </div>

                </div>

            </div>

        </div>

        <!-- FORMULARIO DE EDICIÓN (Lógica de ellas + tu estilo) -->
        <div class="col-md-8">

            <div class="card card-premium shadow-lg border-0 overflow-hidden">

                <div class="card-header text-white py-3" style="background: #8fae73;">

                    <h4 class="mb-0 ms-2">
                        <i class="bi bi-pencil-fill me-2"></i>
                        Actualizar Información
                    </h4>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('services.update', $service) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label class="fw-bold mb-2 text-muted">Nombre del Servicio</label>

                            <input type="text" name="name" 
                                   class="form-control form-control-lg form-control-premium" 
                                   value="{{ old('name', $service->name) }}" required>

                        </div>

                        <div class="mb-4">

                            <label class="fw-bold mb-2 text-muted">Descripción</label>

                            <textarea name="description" rows="4" 
                                      class="form-control form-control-premium">{{ old('description', $service->description) }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="fw-bold mb-2 text-muted">Precio ($)</label>

                                <input type="number" step="0.01" name="price" 
                                       class="form-control form-control-lg form-control-premium" 
                                       value="{{ old('price', $service->price) }}" required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="fw-bold mb-2 text-muted">Duración (minutos)</label>

                                <input type="number" name="duration" 
                                       class="form-control form-control-lg form-control-premium" 
                                       value="{{ old('duration', $service->duration) }}" required>

                            </div>

                        </div>

                        <div class="d-flex gap-3 mt-4">

                            <button type="submit" class="btn btn-lg text-white shadow-sm" 
                                    style="background: #6f7f5d; border-radius: 15px; padding: 12px 30px;">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                Guardar Cambios
                            </button>

                            <a href="{{ route('services.index') }}" 
                               class="btn btn-lg btn-outline-secondary" 
                               style="border-radius: 15px; padding: 12px 30px;">
                                <i class="bi bi-x-circle me-2"></i>
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
