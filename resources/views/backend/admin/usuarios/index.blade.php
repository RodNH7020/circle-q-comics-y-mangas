@extends('layouts.app')

@section('content')

<div class="container my-5">

    <div class="card shadow-lg border-0"
         style="background-color: rgba(0,0,0,0.92); border-radius:15px;">

        <div class="card-header bg-transparent border-0 p-4">

            <h2 class="fw-bold text-center"
                style="color:#ff5733;">
                Gestión de Usuarios
            </h2>

        </div>

        <div class="card-body text-white">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-dark table-hover align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Provincia</th>
                            <th>Ciudad</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    @foreach($usuarios as $usuario)

                        <tr>

                            <td>{{ $usuario->id }}</td>

                            <td>{{ $usuario->nombre }}</td>

                            <td>{{ $usuario->apellido }}</td>

                            <td>{{ $usuario->email }}</td>

                            <td>{{ $usuario->provincia }}</td>

                            <td>{{ $usuario->ciudad }}</td>

                            <td>

                                @if($usuario->role == 'admin')

                                    <span class="badge bg-success">
                                        Administrador
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        Usuario
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($usuario->id == auth()->id())

                                    <span class="text-warning">
                                        Tu cuenta
                                    </span>

                                @else

                                    <form action="{{ route('admin.usuarios.rol', $usuario->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('PUT')

                                        @if($usuario->role == 'admin')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm">
                                                Quitar Admin
                                            </button>

                                        @else

                                            <button type="submit"
                                                    class="btn btn-warning btn-sm">
                                                Hacer Admin
                                            </button>

                                        @endif

                                    </form>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection