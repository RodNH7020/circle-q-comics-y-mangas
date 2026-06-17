@extends('layouts.app')

@section('content')

<div class="container my-5">

    <div class="card shadow-lg border-0"
         style="background-color: rgba(0,0,0,0.92); border-radius:15px;">

        <div class="card-header bg-transparent border-0 p-4">

            <h2 class="fw-bold text-center"
                style="color:#ff5733;">
                Mis Consultas
            </h2>

        </div>

        <div class="card-body text-white">

            <div class="table-responsive">

                <table class="table table-dark table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Consulta</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($consultas as $consulta)

                        <tr>

                            <td>{{ $consulta->id }}</td>

                            <td>{{ $consulta->mensaje }}</td>

                            <td>

                                @if($consulta->estado == 'resuelta')

                                    <span class="badge bg-success">
                                        Resuelta
                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark">
                                        Pendiente
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                No tenés consultas realizadas.
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