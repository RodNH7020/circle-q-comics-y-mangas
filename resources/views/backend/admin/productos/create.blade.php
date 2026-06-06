@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Nuevo Producto</h1>

    <form action="/admin/productos" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text"
                   name="nombre"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion"
                      class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Editorial</label>
            <input type="text"
                   name="editorial"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Tipo</label>
            <input type="text"
                   name="tipo"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number"
                   step="0.01"
                   name="precio"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number"
                   name="stock"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label>URL Imagen</label>
            <input type="text"
                   name="url_imagen"
                   class="form-control">
        </div>

        <button type="submit"
                class="btn btn-success">
            Guardar Producto
        </button>

    </form>

</div>

@endsection