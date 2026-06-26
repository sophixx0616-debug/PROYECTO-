@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="text-center fw-bold mb-5" style="color:#6f7f5d;font-size:50px;">
        <i class="bi bi-calendar-heart"></i>
        Detalle de Cita
    </h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card border-0 shadow-sm" style="border-radius:25px;overflow:hidden;">

                <div class="card-header text-white" style="background:#8fae73;">
                    <h5 class="mb-0"><i class="bi bi-stars"></i> Cita #{{ $appointment->id }}</h5>
                </div>

                <div class="card-body p-4">

                    <p><strong>Servicio:</strong> {{ $appointment->service->name }}</p>
                    <p><strong>Fecha:</strong> {{ $appointment->date }}</p>
                    <p><strong>Hora:</strong> {{ $appointment->time }}</p>
                    <p><strong>Especialista:</strong> {{ $appointment->worker }}</p>
                    <p><strong>Cliente:</strong> {{ $appointment->user->name ?? 'N/A' }}</p>
                    <p>
                        <strong>Estado:</strong>
                        @php
                            $badgeClass = match($appointment->status) {
                                'confirmada' => 'badge-confirmada',
                                'pendiente'  => 'badge-pendiente',
                                default      => 'badge-cancelada',
                            };
                        @endphp
                        <span class="{{ $badgeClass }}">
                            {{ $appointment->status }}
                        </span>
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>

                        @if(auth()->user()->role && auth()->user()->role->name === 'admin')
                        <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>
                        @endif
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
