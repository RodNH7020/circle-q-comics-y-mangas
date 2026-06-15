@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0" style="background-color: rgba(0, 0, 0, 0.95); border-radius: 15px;">
        
        <div class="card-header bg-transparent border-bottom-0 pt-4 pb-2 text-center">
            {{-- Cambié el color del título para que contraste mejor con el fondo negro --}}
            <h2 class="fw-bold" style="color: #ff5733;">Panel de Administración</h2> 
            <p class="text-white-50">Seleccioná el módulo que deseás gestionar</p>
        </div>

        <div class="card-body p-4">
            <div class="row g-4">
                
                <div class="col-md-6 col-lg-3">
                    <a href="/admin/productos" class="text-decoration-none">
                        <div class="card h-100 border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-white fw-semibold mb-0">Productos</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="/admin/usuarios" class="text-decoration-none">
                        <div class="card h-100 border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-white fw-semibold mb-0">Usuarios</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="/admin/contactos" class="text-decoration-none">
                        <div class="card h-100 border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-white fw-semibold mb-0">Consultas</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="{{ route('admin.ventas') }}" class="text-decoration-none">
                        <div class="card h-100 border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-white fw-semibold mb-0">Ventas</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .admin-card {
        background-color: #1c1c1c; /* Gris oscuro elegante */
        transition: all 0.3s ease;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(120, 0, 0, 0.2); /* Sombra roja sutil */
        border: 1px solid #333 !important;
    }
    
    .admin-card:hover {
        transform: translateY(-5px);
        background-color: rgba(120, 0, 0, 0.95) !important; /* Rojo de tu marca al pasar el mouse */
        box-shadow: 0 10px 20px rgba(120, 0, 0, 0.6);
        border: 1px solid #ff5733 !important; /* Borde naranja brillante */
    }
    
    /* Aseguramos que el texto y el ícono resalten siempre */
    .admin-card .card-title {
        transition: all 0.3s ease;
        letter-spacing: 1px;
    }
</style>
@endsection