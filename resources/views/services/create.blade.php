@extends('layouts.app')

@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container py-4">

    <h1 class="text-center fw-bold mb-5"
        style="color:#6f7f5d;font-size:50px;">

        <i class="bi bi-stars"></i>
        Nuevo Servicio

    </h1>

    <div class="row justify-content-center">

        <!-- TARJETA IZQUIERDA -->

        <div class="col-md-4 mb-4">

            <div class="card border-0 shadow-lg"
                 style="border-radius:25px;">

                <div class="card-body text-center p-4">

                    <i class="bi bi-flower1"
                       style="
                        font-size:100px;
                        color:#e7a6b6;
                       ">
                    </i>

                    <h4 class="mt-3"
                        style="color:#6f7f5d;">

                        SPA LAS DIVINAS

                    </h4>

                    <p class="text-muted">

                        Registra nuevos servicios para tus clientes.

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

                        <i class="bi bi-journal-plus"></i>
                        Información del Servicio

                    </h4>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('services.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Nombre del Servicio
                            </label>

                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg"
                                   required>

                        </div>

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Descripción
                            </label>

                            <textarea name="description"
                                      rows="4"
                                      class="form-control"></textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label class="fw-bold mb-2">
                                    Precio
                                </label>

                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       class="form-control form-control-lg"
                                       required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label class="fw-bold mb-2">
                                    Duración (minutos)
                                </label>

                                <input type="number"
                                       name="duration"
                                       value="60"
                                       class="form-control form-control-lg"
                                       required>

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="fw-bold mb-2">
                                Estado
                            </label>

                            <select name="status"
                                    class="form-select form-select-lg">

                                <option value="1">
                                    Activo
                                </option>

                                <option value="0">
                                    Inactivo
                                </option>

                            </select>

                        </div>

                        <div class="d-flex gap-3">

                            <button type="submit"
                                    class="btn btn-lg text-white"
                                    style="
                                        background:#6f7f5d;
                                        border:none;
                                    ">

                                <i class="bi bi-check-circle-fill"></i>
                                Guardar Servicio

                            </button>

                            <a href="{{ route('services.index') }}"
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