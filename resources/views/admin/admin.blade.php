@extends('layouts.app_admin')

<!-- Panel administrativo -->
@section('titulo')
    - Principal
@endsection

@section('contenido')
    <!-- Contenedor principal -->
    <div class="container d-flex flex-column justify-content-center mt-4">
        <div class="row g-3">
            <div class="col-md-4" >
                <div class="bg-info p-3 text-white text-center rounded p-4" >
                    <a href="{{ route('tabla-platos') }}" class="text-white text-decoration-none fw-bold">Platos</a>

                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-danger p-3 text-white text-center rounded p-4">
                    <a href="{{ route('tabla-pedidos') }}" class="text-white text-decoration-none fw-bold">Pedidos</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-success p-3 text-white text-center rounded p-4">
                    <a href="{{ route('tabla-user') }}" class="text-white text-decoration-none fw-bold">Usuarios</a>
                </div>
            </div>
        </div>

        <img class="img-fluid mt-4" src="{{ asset('img/portada.png') }}" alt="Alternativa img">
    </div>
@endsection
