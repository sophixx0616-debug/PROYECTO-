@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header text-white"
             style="background:#6f7f5d;">

            <h3>
                📦 Nuevo Producto
            </h3>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('inventory.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label>Nombre</label>

                    <input type="text"
                           name="product_name"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Marca</label>

                    <input type="text"
                           name="brand"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Stock</label>

                    <input type="number"
                           name="stock"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Categoría</label>

                    <select name="category"
                            class="form-select">

                        <option>Facial</option>
                        <option>Manicure</option>
                        <option>Pedicure</option>
                        <option>Cabello</option>
                        <option>Masajes</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Descripción</label>

                    <textarea
                        name="description"
                        class="form-control"></textarea>

                </div>

                <div class="mb-3">

                    <label>Precio</label>

                    <input type="number"
                           step="0.01"
                           name="price"
                           class="form-control"
                           required>

                </div>

                <div class="mb-4">

                    <label>Imagen del producto</label>

                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*">

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d">

                    Guardar

                </button>

                <a href="{{ route('inventory.index') }}"
                   class="btn btn-secondary">

                    Cancelar

                </a>

            </form>

        </div>

    </div>

</div>

@endsection