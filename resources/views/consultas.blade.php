@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

<div class="container my-5">
    <div class="card shadow-sm border-0 bg-white">
        <div class="card-body p-4"> <h2 class="mb-4">Nuestra Sucursal</h2>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0" style="background-color: #f8f9fa;">
                        <div class="card-body">
                            <h5 class="fw-bold text-danger">Circle Q - Central</h5>
                            <hr>
                            <p class="mb-2"><strong>Dirección:</strong><br> Junín 1234, Corrientes</p>
                            <p class="mb-2"><strong>Horarios:</strong><br> Lunes a Sábados: 09:00 a 20:00 hs.</p>
                            <p class="mb-3"><strong>Teléfono:</strong><br> 3794026500</p>
                            <a href="https://wa.me/5493794026500" target="_blank" class="btn btn-danger w-100">
                                Consultar por WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="ratio ratio-16x9 shadow-sm rounded overflow-hidden border">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.061483321523!2d-58.8354674!3d-27.4673669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca010f3c5ed%3A0x6b772c7a0d42130e!2zSnVuw61uIDEyMzQsIFczNDAwIEFSQSwgQ29ycmllbnRlcw!5e0!3m2!1ses-419!2sar!4v1713364400000!5m2!1ses-419!2sar" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div> </div> </div> </div>