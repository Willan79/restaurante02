@extends('layouts.app')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('contenido')
    <div class="container" style="min-height: calc(90vh - 64px);">
        <!-- Encabezado con imagen de fondo -->
        <div class="position-relative rounded shadow-lg overflow-hidden mb-4">
            <img src="{{ asset('img/fondo-2.jpg') }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
            <div
                class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-50 text-center">
                <h1 class="text-info display-4 fw-bold">Bienvenidos a tú Restaurante</h1>
                <p class="text-light fs-4">Disfruta de lo mejor de la gastronomía Colombiana en un ambiente familiar y
                    acogedor.</p>
            </div>
        </div>

        <!-- Sección de promoción y platos destacados -->
        <div class="text-center mb-5 ">

            <h2 class="text-primary fw-bold display-5">Nuestra Especialidad</h2>
            <p class="fs-4 text-light">Platos llenos de sabor y tradición que te harán sentir en casa.</p>
        </div>

        <div class="row ">
            <!-- Plato 1 -->
            <div class="col-md-4 mb-2">
                <div class="card shadow-sm">
                    <img src="{{ asset('img/plato-19.jpeg') }}" class="card-img-top" alt="Plato Llanero">
                    <div class="card-body">
                        <h3 class="card-title fw-bold">Plato Colombiano</h3>
                        <p class="card-text text-muted">Carne asada al carbón, acompañada de yuca y arepa, un clásico que no
                            puedes dejar de probar.</p>
                    </div>
                </div>
            </div>
            <!-- Plato 2 -->
            <div class="col-md-4 mb-2">
                <div class="card shadow-sm">
                    <img src="{{ asset('img/plato-18.jpeg') }}" class="card-img-top" alt="Sancocho">
                    <div class="card-body">
                        <h3 class="card-title fw-bold">Sancocho Colombiano</h3>
                        <p class="card-text text-muted">Un delicioso sancocho con el auténtico sabor Colombiano, ideal para
                            compartir con toda familia.</p>
                    </div>
                </div>
            </div>
            <!-- Plato 3 -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('img/Mixto.jpg') }}" class="card-img-top" alt="Asado Llanero">
                    <div class="card-body">
                        <h3 class="card-title fw-bold">Asado Colombiano</h3>
                        <p class="card-text text-muted">El mejor asado de la región, con ese toque tradicional que solo
                            encontrarás aquí en Colombia.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="mt-4 text-center ">
            <a href="{{ route('menu') }}" class="btn btn-outline-primary btn-lg mx-2">MENÚ</a>

        </div>

        <!-- Sección de contacto -->
        <div class="mt-4 p-4 bg-light rounded text-center shadow-sm ">
            <h3 class="fw-bold">Contáctanos</h3>
            <p class="fs-5 text-muted">Haz tu pedido ahora o visítanos en nuestro restaurante, en la Calle xxxxxxxxx, Barrio
                xxxxxxxxx.</p>
            <p class="fs-5 text-muted">Pide más información al <strong>xxxxxxxxx</strong></p>
            <p class="fs-5 text-muted">Email: xxxxxxxxx@hotmail.com</p>

        </div>
    </div>
@endsection
