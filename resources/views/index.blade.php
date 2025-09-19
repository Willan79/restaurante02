@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('contenido')
    <div class="position-relative rounded shadow-lg overflow-hidden mb-4">
        <img src="{{ asset('img/bonsai.png') }}" class="img-fluid w-100" style="height: 800px; object-fit: cover;">

    </div>

    <!-- Sección de promoción y platos destacados -->
    <div class="text-center mb-5 shadow-lg rounded p-4">
        <h2 class="text-success fw-bold display-5">Nuestra Especialidad</h2>
        <p class="fs-4 text-">Platos llenos de sabor y tradición que te harán sentir en casa.</p>
    </div>

    <div class="row ">
        <!-- Plato 1 -->
        <div class="col-md-4 mb-2">
            <div class="card shadow-lg">
                <img src="{{ asset('img/bandeja.png') }}" class="card-img-top" alt="Plato Llanero">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Bandeja Paisa</h3>
                    <p class="card-text text-muted">Es una comida abundante y variada que refleja la riqueza gastronómica de la región. Incluye arroz blanco, fríjoles rojos, carne molida o en bistec, chicharrón crocante, huevo frito, plátano maduro frito, arepa antioqueña, aguacate y chorizo acompañado de hogao.</p>
                </div>
            </div>
        </div>
        <!-- Plato 2 -->
        <div class="col-md-4 mb-2">
            <div class="card shadow-lg">
                <img src="{{ asset('img/plato-18.jpeg') }}" class="card-img-top" alt="Sancocho">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Sancocho Antioqueño</h3>
                    <p class="card-text text-muted">Un caldo espeso y muy tradicional en reuniones familiares y festivos. Se prepara con carne de res, cerdo o gallina, acompañado de plátano verde, yuca, papa y mazorca. Se sirve caliente con arroz, aguacate, ají y arepa.</p>
                </div>
            </div>
        </div>
        <!-- Plato 3 -->
        <div class="col-md-4">
            <div class="card shadow-lg">
                <img src="{{ asset('img/mondongo.png') }}" class="card-img-top" alt="Asado Llanero">
                <div class="card-body">
                    <h3 class="card-title fw-bold">Mondongo Antioqueño</h3>
                    <p class="card-text text-muted">Una sopa espesa y nutritiva preparada con callo (panza de res), carne de cerdo, carne de res y chorizo, acompañada de papa, yuca, zanahoria y arveja. Se sirve con arroz blanco, arepa y aguacate. Es muy popular en reuniones familiares y fines de semana.</p>
                </div>
            </div>
        </div>
    </div>

@endsection
