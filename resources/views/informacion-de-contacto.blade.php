@extends('layouts.app')

@section('title', 'Contacto')

@section('content')


<div class="container my-5">
    <div class="card shadow-sm border-0 p-4 p-md-5 fondo-texto">
        
        <div class="row gx-lg-5 gy-4">
            <div class="col-12 col-md-6">
                <h3 class="mb-3">Datos de la Empresa</h3>
                <div class="lh-lg"> <p class="mb-1"><strong>Titular:</strong> Circle Q</p>
                    <p class="mb-1"><strong>Razón Social:</strong> Sociedad Anónima</p>
                    <p class="mb-1"><strong>Domicilio Legal:</strong> Junín 1234, Corrientes</p>
                    <p class="mb-1"><strong>Teléfono:</strong> 37944582</p>
                    <p class="mb-1"><strong>Email:</strong> Circleq@gmail.com</p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <h3 class="mb-3">Contactanos:</h3>
                <form action="{{ route('contacto.enviar') }}" method="POST">
                    @csrf
                    <div class="row g-2">
                        <div class="col-12 col-sm-6 mb-3">
                           <input type="text" 
                                   name="nombre" 
                                   class="form-control @error('nombre') is-invalid @enderror" 
                                   placeholder="Tu Nombre"
                                   value="{{ old('nombre') }}"
                                   required 
                                    pattern="[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]+" 
                                   title="Por favor, ingresa solo letras.">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="col-12 col-sm-6 mb-3">
                            <input 

                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror" 
                            placeholder="Tu Email" 
                            value="{{ old('email') }}"
                       required> @error('email')
                             <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                        </div>
                    </div>
                    
                    
                    
                    
            <div class="mb-3">
            
            <textarea name="mensaje" 
                      class="form-control @error('mensaje') is-invalid @enderror" 
                      rows="3" 
                      placeholder="Tu Mensaje"
                      required
                       minlength="10">{{ old('mensaje') }}</textarea>
            
            @error('mensaje')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

     
        <button type="submit" class="btn btn-dark w-100">Enviar Mensaje</button>
                </form>
            </div>
        </div>







        <div class="row">
            <div class="col-12">
                <h2 class="text-center" style="margin-top: clamp(50px, 8vw, 100px); margin-bottom: 50px;">
                    Nuestra Sucursal
                </h2>
            </div>
        </div>

        <div class="row align-items-stretch gx-lg-5 gy-4"> 
            <div class="col-12 col-md-6">
                <div class="card shadow-sm border-0 text-white h-100" style="background-color: #272a2e;">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-danger">Circle Q</h5>
                        <hr class="border-secondary">
                        <p class="mb-3"><strong>Dirección:</strong><br> 25 de Mayo 1317, Corrientes</p>
                        <p class="mb-3"><strong>Horarios:</strong><br> Lunes a Sábados: 09:00 a 20:00 hs.</p>
                        <p class="mb-4"><strong>Teléfono:</strong><br> 3794026500</p>
                        <a href="https://wa.me/5493794026500" target="_blank" class="btn btn-danger w-100 py-2">
                            Consultar por WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="ratio ratio-16x9 shadow-sm rounded overflow-hidden border border-secondary h-100">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.0767687259865!2d-58.835910855572486!3d-27.464478999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca663d2abf1%3A0x231ad363681cd980!2s25%20de%20Mayo%201317%2C%20W3400%20BCT%2C%20Corrientes!5e0!3m2!1ses-419!2sar!4v1776440146612!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        
                        style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div> </div> </div> 


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Solo se activa si el controlador envía la señal de 'status'
    @if(session('status') == 'enviado')
        Swal.fire({
            title: '¡Consulta enviada!',
            text: 'Tu mensaje llegó correctamente. En breve te responderemos.',
            icon: 'success',
            timer: 4000, 
            timerProgressBar: true, 
            showConfirmButton: false, 
            allowOutsideClick: false, 
            background: '#ffffff',
            iconColor: '#43694c' 
        }).then(() => {
            window.location.href = "{{ url('/home') }}";
        });
    @endif
</script>
@endsection