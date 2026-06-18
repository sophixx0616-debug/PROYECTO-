@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Nuevo Producto</h1>

    <form action="{{ route('inventory.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre del producto</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <select name="category" class="form-control" required>
                <option value="facil">Facial</option>
                <option value="manicure">Manicure</option>
                <option value="otros">Otros</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</div>
@endsection