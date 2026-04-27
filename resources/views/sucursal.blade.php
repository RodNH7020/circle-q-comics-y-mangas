@extends('layouts.app')

@section('title', 'Sucursal')

@section('content')

<div class="container my-5">
    <div class="card shadow-sm border-0 fondo texto">
        <div class="card-body p-4"> 
            
            <h2 class="mb-4">Nuestra Sucursal</h2>
            
            <div class="row align-items-center"> <div class="col-md-4 mb-3">
                    <div class="card shadow-sm border-0 text-white" style="background-color: #272a2e;">
                      
                        
                        <div class="card-body">
                            <h5 class="fw-bold text-danger">Circle Q</h5>
                            <hr class="border-secondary">
                            <p class="mb-2"><strong>Dirección:</strong><br> 25 de Mayo 1317, Corrientes</p>
                            <p class="mb-2"><strong>Horarios:</strong><br> Lunes a Sábados: 09:00 a 20:00 hs.</p>
                            <p class="mb-3"><strong>Teléfono:</strong><br> 3794026500</p>
                            <a href="https://wa.me/5493794026500" target="_blank" class="btn btn-danger w-100">
                                Consultar por WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mb-3">
                    <div class="ratio ratio-16x9 shadow-sm rounded overflow-hidden border border-secondary">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.0767687259865!2d-58.835910855572486!3d-27.464478999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca663d2abf1%3A0x231ad363681cd980!2s25%20de%20Mayo%201317%2C%20W3400%20BCT%2C%20Corrientes!5e0!3m2!1ses-419!2sar!4v1776440146612!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
        
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div> </div> </div> </div>

@endsection