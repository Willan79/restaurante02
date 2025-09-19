@extends('layouts/app')

@section('contenido')

    <h2 class="text-center text-success fw-bold position-relative">Categorías</h2>

    <div class="container py-2">
        <div class="row justify-content-center">

            <!-- Primer elemento -->
            <div class="col-md-4">
                <div class="card shadow-lg mb-2">
                    <img class="card-img-top " src="{{ asset('img/Corriente.jpeg') }}" alt="Corriente">
                    <div class="card-body text-center">
                        <a href="{{ route('menu_corriente') }}" class="btn btn-outline-primary fw-bold text-width">
                            Corriente
                        </a>
                        <p class="mt-3">Estos platos reflejan la esencia de la cocina Colombiana, con sabores tradicionales que satisfacen los antojos más arraigados.</p>
                    </div>
                </div>
            </div>

            <!-- Segundo elemento -->
            <div class="col-md-4">
                <div class="card shadow-lg mb-2">
                    <img class="card-img-top" src="{{ asset('img/Ejecutivo.jpg') }}" alt="Ejecutivo">
                    <div class="card-body text-center">
                        <a href="{{ route('menu_ejecutivo') }}" class="btn btn-outline-primary fw-bold text-width">
                            Ejecutivo
                        </a>
                        <p class="mt-3">Pija Pariente eleva la experiencia con cortes selectos de carne, preparados con técnicas tradicionales.</p>
                    </div>
                </div>
            </div>

            <!-- Tercer elemento -->
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <img class="card-img-top" src="{{ asset('img/Especial.jpeg') }}" alt="Especial">
                    <div class="card-body text-center">
                        <a href="{{ route('menu_especial') }}" class="btn btn-outline-primary fw-bold text-width">
                            Especial
                        </a>
                        <p class="mt-3">Estos platos están diseñados para aquellos que buscan una experiencia culinaria única y memorable en el contexto del asado llanero.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
