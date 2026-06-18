@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 style="color:#6f7f5d;font-weight:700;">
            <i class="fas fa-user-nurse me-2"></i>
            Gestión de Especialistas
        </h1>

        <a href="{{ route('specialists.create') }}"
           class="btn text-white"
           style="background:#6f7f5d;border-radius:12px;">

            <i class="fas fa-circle-plus"></i>
            Nueva Especialista

        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <table class="table align-middle">

                <thead>

                    <tr>
                        <th><i class="fas fa-user"></i> Nombre</th>
                        <th><i class="fas fa-spa"></i> Especialidad</th>
                        <th class="text-center">Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($specialists as $specialist)

                    <tr>

                        <td>
                            <i class="fas fa-user-nurse text-success me-2"></i>
                            {{ $specialist->name }}
                        </td>

                        <td>
                            <i class="fas fa-wand-magic-sparkles me-2"
                               style="color:#e7a6b6;"></i>
                            {{ $specialist->specialty }}
                        </td>

                        <td class="text-center">

                            <a href="{{ route('specialists.edit',$specialist->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-pen-to-square"></i>

                            </a>

                            <form action="{{ route('specialists.destroy',$specialist->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash-can"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center py-4">

                            <i class="fas fa-user-slash fa-2x mb-3"
                               style="color:#e7a6b6;"></i>

                            <p>No hay especialistas registradas.</p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
