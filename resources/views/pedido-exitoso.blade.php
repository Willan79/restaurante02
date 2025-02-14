@extends('layouts.app')


@section('contenido')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg text-center" style="max-width: 500px;">
            <div class="card-body">
                <h2 class="card-title text-success fw-bold">Pedido Confirmado</h2>

                <div class="alert alert-success mt-3">
                    <p>Tu pedido ha sido confirmado con éxito. Gracias por elegirnos.</p>
                </div>

                <a href="{{ route('menu') }}" class="btn btn-primary mt-3">
                    Volver al Menú
                </a>
            </div>
        </div>
    </div>
@endsection
