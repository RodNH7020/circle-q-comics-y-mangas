@extends('layouts.app')

@section('content')

<div class="container my-5">

```
<div class="card shadow-lg border-0"
     style="background-color: rgba(0,0,0,0.92); border-radius:15px;">

    <div class="card-header bg-transparent border-0 text-center pt-4">
        <h2 class="fw-bold" style="color:#ff5733;">
            Nuevo Producto
        </h2>
    </div>

    <div class="card-body text-white p-4">

        <form action="/admin/productos" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control bg-dark text-white border-secondary">
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion"
                          rows="4"
                          class="form-control bg-dark text-white border-secondary"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Editorial</label>
                <input type="text"
                       name="editorial"
                       class="form-control bg-dark text-white border-secondary">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <input type="text"
                       name="tipo"
                       class="form-control bg-dark text-white border-secondary">
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number"
                           step="0.01"
                           name="precio"
                           class="form-control bg-dark text-white border-secondary">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number"
                           name="stock"
                           class="form-control bg-dark text-white border-secondary">
                </div>

            </div>

            <div class="mb-4">
                <label class="form-label">URL Imagen</label>
                <input type="text"
                       name="url_imagen"
                       class="form-control bg-dark text-white border-secondary">
            </div>

            <div class="text-center">

                <button type="submit"
                        class="btn btn-lg px-4"
                        style="background-color:#ff5733;color:white;">
                    Guardar Producto
                </button>

                <a href="{{ route('productos.index') }}"
                   class="btn btn-outline-light btn-lg ms-2">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>
```

</div>

@endsection
