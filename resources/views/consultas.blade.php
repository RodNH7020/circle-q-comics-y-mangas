@extends('layouts.app')

@section('title', 'Consultas')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 fondo-texto p-4 rounded shadow">
            
            <h3 class="mb-4 text-center">Dejanos tu consulta</h3>
            
            <form action="{{ route('contacto.enviar') }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-12 col-sm-6 mb-3">
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                               placeholder="Tu Nombre" value="{{ old('nombre') }}" required>
                        @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 col-sm-6 mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                               placeholder="Tu Email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <textarea name="mensaje" class="form-control @error('mensaje') is-invalid @enderror" 
                              rows="4" placeholder="Tu Mensaje" required minlength="10">{{ old('mensaje') }}</textarea>
                    @error('mensaje') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(session('status') == 'enviado')
        Swal.fire({
            title: '¡Consulta enviada!',
            color: '#fff8f8',
            text: 'Tu mensaje llegó correctamente. En breve te responderemos.',
            icon: 'success',
            timer: 4000, 
            timerProgressBar: true, 
            showConfirmButton: false, 
            allowOutsideClick: false, 
            background: '#000000',
            iconColor: '#43694c' 
        }).then(() => {
            window.location.href = "{{ url('/home') }}";
        });
    @endif
</script>
@endsection