@extends('layouts.app')

@section('content')

<link href="https://googleapis.com" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    .spa-card {
        border: none;
        border-radius: 30px;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        transition: all 0.4s ease;
        border: 1px solid rgba(225, 190, 231, 0.3);
    }

    .spa-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(111, 127, 93, 0.1);
    }

    .icono-contenedor {
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-bottom: 2px solid #e7a6b6;
    }

    .btn-nuevo {
        background-color: #6f7f5d;
        color: white !important;
        border-radius: 15px;
        padding: 10px 25px;
        text-decoration: none;
        transition: 0.3s;
        display: inline-block;
    }

    .btn-nuevo:hover {
        background-color: #5a6a4a;
        transform: scale(1.05);
    }

    .precio-tag {
        color: #6f7f5d;
        font-weight: 700;
        font-size: 1.5rem;
    }

</style>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="display-4 fuente-elegante">
                Nuestros Servicios
            </h1>

            <p class="text-muted">
                <i class="bi bi-stars"></i> 
                Total servicios: {{ $services->count() }}
            </p>

        </div>

        @if(Auth::user()->role->name === 'admin')

            <a href="{{ route('services.create') }}" 
               class="btn-nuevo shadow-sm">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Nuevo Servicio
            </a>

        @endif

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm mb-4 text-center" 
             style="border-radius: 15px; background-color: #fdf1f4; color: #6f7f5d;">
            
            <i class="bi bi-check-circle-fill me-2"></i> 
            {{ session('success') }}

        </div>

    @endif

    <div class="row g-4 justify-content-center">

        @forelse($services as $service)

            <div class="col-md-4">

                <div class="card h-100 spa-card shadow-sm p-4 text-center">
                    
                    <div class="icono-contenedor">

                        <i class="bi bi-flower1 fs-2" 
                           style="color: #e7a6b6;">
                        </i>

                    </div>
                    
                    <h4 class="fuente-elegante mb-2">
                        {{ $service->name }}
                    </h4>
                    
                    <p class="small mb-3" 
                       style="color: #e7a6b6; font-weight: 500;">

                        <i class="bi bi-clock-fill me-1"></i> 
                        Duración: {{ $service->duration ?? '60' }} min

                    </p>

                    <p class="text-muted small mb-4 px-2">

                        {{ $service->description ?? 'Tratamiento exclusivo diseñado para tu bienestar.' }}

                    </p>
                    
                    <div class="mb-4">

                        <span class="precio-tag">
                            ${{ number_format($service->price, 0, ',', '.') }}
                        </span>

                    </div>

                    @if(Auth::user()->role->name === 'admin')

                        <div class="d-flex justify-content-center gap-2 mt-auto pt-3 border-top border-light">

                            <a href="{{ route('services.edit', $service) }}" 
                               class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('services.destroy', $service) }}" 
                                  method="POST" 
                                  style="display:inline-block;">

                                @csrf 
                                @method('DELETE')

                                <button type="submit" 
                                        class="btn btn-sm btn-outline-danger rounded-pill px-3" 
                                        onclick="return confirm('¿Eliminar servicio?')">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            </div>

        @empty

            <div class="col-12 text-center py-5">

                <div class="alert shadow-sm w-50 mx-auto" 
                     style="background: white; border-radius: 20px;">

                    <i class="bi bi-info-circle fs-2 mb-3 d-block" 
                       style="color: #e7a6b6;">
                    </i>

                    <p class="fuente-elegante fs-4">
                        No hay servicios registrados.
                    </p>

                </div>

            </div>

        @endforelse

    </div>

    <div class="text-center mt-5">

        <a href="{{ route('dashboard') }}" 
           class="btn btn-link text-muted text-decoration-none">
            <i class="bi bi-arrow-left"></i> Volver al Panel
        </a>

    </div>

</div>
                    
@endsection
