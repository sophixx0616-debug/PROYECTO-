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
      method="POST"
      enctype="multipart/form-data">

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
                    <div class="mb-4">

    <label class="fw-bold mb-2">

        <i class="fas fa-image"></i>
        Fotografía

    </label>

    @if($specialist->image)

        <div class="mb-3">

            <img src="{{ asset('storage/'.$specialist->image) }}"
                 class="img-fluid rounded shadow"
                 style="
                    width:220px;
                    height:220px;
                    object-fit:cover;
                    border-radius:20px;
                 ">

        </div>

    @endif

    <input type="file"
           name="image"
           class="form-control form-control-lg"
           accept="image/*">

    <small class="text-muted">
        Selecciona una nueva imagen únicamente si deseas reemplazar la actual.
    </small>

</div>

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