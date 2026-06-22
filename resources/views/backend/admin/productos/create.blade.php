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
    @if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif
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

                <select id="editorialSelect"
                        name="editorial"
                        class="form-select bg-dark text-white border-secondary">

                    @foreach($editoriales as $editorial)

                        <option value="{{ $editorial }}">
                            {{ $editorial }}
                        </option>

                    @endforeach

                    <option value="Nueva">
                        + Agregar nueva editorial
                    </option>

                </select>
            </div>

            <div class="mb-3"
                id="nuevaEditorialDiv"
                style="display:none;">

                <label class="form-label">
                    Nueva Editorial
                </label>

                <input type="text"
                    name="editorial_nueva"
                    class="form-control bg-dark text-white border-secondary">

            </div>

            <script>

            document.getElementById('editorialSelect')
            .addEventListener('change', function() {

                document.getElementById('nuevaEditorialDiv')
                    .style.display =
                        this.value === 'Nueva'
                        ? 'block'
                        : 'none';

            });

            </script>

            <div class="mb-3">
                <label class="form-label">Tipo</label>
                <select name="tipo"
                        class="form-select bg-dark text-white border-secondary"
                        required>

                    <option value="">Seleccione un tipo</option>

                    <option value="Comic">
                        Comic
                    </option>

                    <option value="Manga">
                        Manga
                    </option>

                </select>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number"
                        step="0.01"
                        min="0.01"
                        name="precio"
                        class="form-control bg-dark text-white border-secondary"
                        required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number"
                           min="0"
                           name="stock"
                           class="form-control bg-dark text-white border-secondary">
                </div>

            </div>

            <div class="mb-4">
                <label class="form-label">Imagen</label>
                    <input type="file"
                        name="imagen"
                        accept="image/*"
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
