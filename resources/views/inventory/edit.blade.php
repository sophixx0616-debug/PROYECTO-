@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header text-white"
             style="background:#6f7f5d;">

            <h3>

                ✏ Editar Producto

            </h3>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('inventory.update',$item->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label>Nombre</label>

                    <input type="text"
                           name="product_name"
                           value="{{ $item->product_name }}"
                           class="form-control"
                           required>

                </div>

                <div class="mb-3">

                    <label>Marca</label>

                    <input type="text"
                           name="brand"
                           value="{{ $item->brand }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Stock</label>

                    <input type="number"
                           name="stock"
                           value="{{ $item->stock }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Categoría</label>

                    <input type="text"
                           name="category"
                           value="{{ $item->category }}"
                           class="form-control">

                </div>

                <div class="mb-3">

                    <label>Descripción</label>

                    <textarea
                        name="description"
                        class="form-control">{{ $item->description }}</textarea>

                </div>

                <div class="mb-3">

                    <label>Precio</label>

                    <input type="number"
                           step="0.01"
                           name="price"
                           value="{{ $item->price }}"
                           class="form-control">

                </div>

                @if($item->image)

                    <img src="{{ asset('storage/'.$item->image) }}"
                         width="180"
                         class="rounded shadow mb-3">

                @endif

                <div class="mb-4">

                    <label>Cambiar imagen</label>

                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*">

                </div>

                <button class="btn text-white"
                        style="background:#6f7f5d">

                    Actualizar

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