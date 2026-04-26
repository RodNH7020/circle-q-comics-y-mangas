@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="container my-5">
    <div class="card shadow-sm border-0 p-5 fondo-texto">
        
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <h3 class="mb-3">Datos de la Empresa</h3>
                <p><strong>Titular:</strong> Circle Q</p>
                <p><strong>Razón Social:</strong> Sociedad Anónima</p>
                <p><strong>Domicilio Legal:</strong> Junín 1234, Corrientes</p>
                <p><strong>Teléfono:</strong> 37944582</p>
                <p><strong>Email:</strong> Circleq@gmail.com</p>
            </div>

            <div class="col-12 col-md-6">
                <h3 class="mb-3">Contactanos:</h3>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Tu Nombre">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" placeholder="Tu Email">
                        </div>
                    </div>
                    <textarea class="form-control mb-3" rows="3" placeholder="Tu Mensaje"></textarea>
                    <button type="button" class="btn btn-dark w-100">Enviar Mensaje</button>
                </form>
            </div>
        </div>

        <hr class="my-4 border-secondary">

        <div class="row g-4 align-items-center">
            <div class="col-12 col-md-12 text-center">
                <h3 class="mb-3">Sucursal</h3>
                <p><strong>Dirección:</strong> Junín 1234, Corrientes</p>
                <p><strong>Horarios:</strong> Lun-Sáb: 09:00 a 20:00 hs.</p>
                <p><strong>Tel:</strong> 3794026500</p>
                <a href="https://wa.me/5493794026500" target="_blank" class="btn btn-outline-danger btn-sm w-100">Consultar por WhatsApp</a>
            </div>

            <div class="col-12 col-md-12 text-center">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.0767687259865!2d-58.835910855572486!3d-27.464478999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca663d2abf1%3A0x231ad363681cd980!2s25%20de%20Mayo%201317%2C%20W3400%20BCT%2C%20Corrientes!5e0!3m2!1ses-419!2sar!4v1776440146612!5m2!1ses-419!2sar" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection