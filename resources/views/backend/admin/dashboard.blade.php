@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 15px;">
        
        <div class="card-header bg-transparent border-bottom-0 pt-4 pb-2 text-center">
            <h2 class="fw-bold" style="color:rgba(120,0,0,0.95);">Panel de Administración</h2> 
            <p class="text-muted">Seleccioná el módulo que deseás gestionar</p>
        </div>

        <div class="card-body p-4">
            <div class="row g-4">
                
                <div class="col-md-6 col-lg-3">
                    <a href="/admin/productos" class="text-decoration-none">
                        <div class="card h-100 bg-light border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-dark fw-semibold mb-0">Productos</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="/admin/usuarios" class="text-decoration-none">
                        <div class="card h-100 bg-light border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-dark fw-semibold mb-0">Usuarios</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="/admin/contactos" class="text-decoration-none">
                        <div class="card h-100 bg-light border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-rgba(0, 0, 0, 0.95) fw-semibold mb-0">Consultas</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <a href="/admin/ventas" class="text-decoration-none">
                        <div class="card h-100 bg-light border-0 admin-card text-center">
                            <div class="card-body d-flex flex-column justify-content-center py-4">
                                <h5 class="card-title text-dark fw-semibold mb-0">Ventas</h5>
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
        transition: all 0.3s ease;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(120,0,0,0.95);
    }
    .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(120,0,0,0.95);
        background-color: #ffffff !important;
        border: 1px solid #dee2e6 !important;
    }
</style>
@endsection