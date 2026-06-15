@extends('layouts.app')

@section('content')

<div class="container my-5">

    <div class="card shadow-lg border-0"
         style="background-color: rgba(0,0,0,0.92); border-radius:15px;">

        <div class="card-header bg-transparent border-0 p-4">

            <h2 class="fw-bold text-center"
                style="color:#ff5733;">
                Gestión de Consultas
            </h2>

        </div>

        <div class="card-body text-white">

            <div class="table-responsive">

                <table class="table table-dark table-hover align-middle">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Consulta</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($consultas as $consulta)

                        <tr>

                            <td>{{ $consulta->id }}</td>

                            <td>{{ $consulta->nombre }}</td>

                            <td>{{ $consulta->email }}</td>

                            <td style="max-width:300px;">
                                {{ $consulta->mensaje }}
                            </td>

                            <td>

                                @if($consulta->estado == 'pendiente')

                                    <span class="badge bg-warning text-dark">
                                        Pendiente
                                    </span>

                                @else

                                    <span class="badge bg-success">
                                        Resuelta
                                    </span>

                                @endif

                            </td>

                            <td>

                                @if($consulta->estado == 'pendiente')

                                    <form action="{{ route('admin.consultas.resolver', $consulta->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                                class="btn btn-success btn-sm">
                                            Marcar Resuelta
                                        </button>

                                    </form>

                                @else

                                    <span class="text-success">
                                        ✓ Resuelta
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">
                                No hay consultas registradas.
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection