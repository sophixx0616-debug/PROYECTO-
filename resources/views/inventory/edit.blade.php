@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Editar Producto</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('inventory.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre del producto</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $item->name }}" required>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" name="quantity" class="form-control"
                   value="{{ $item->quantity }}" required>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" class="form-control"
                   value="{{ $item->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>

        <a href="{{ route('inventory.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>
@endsection