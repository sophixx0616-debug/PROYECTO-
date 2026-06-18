// prueba github
@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-header text-white py-3"
             style="background:#e7a6b6;">

            <h4 class="mb-0">

                <i class="fas fa-pen-to-square"></i>
                Editar Especialista

            </h4>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('specialists.update',$specialist->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-user"></i>
                        Nombre Completo

                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $specialist->name }}"
                           class="form-control form-control-lg"
                           required>

                </div>

                <div class="mb-4">

                    <label class="fw-bold mb-2">

                        <i class="fas fa-spa"></i>
                        Especialidad

                    </label>

                    <input type="text"
                           name="specialty"
                           value="{{ $specialist->specialty }}"
                           class="form-control form-control-lg"
                           required>

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d;">

                    <i class="fas fa-floppy-disk"></i>
                    Actualizar

                </button>

                <a href="{{ route('specialists.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Volver

                </a>

            </form>

        </div>

    </div>

</div>

@endsection