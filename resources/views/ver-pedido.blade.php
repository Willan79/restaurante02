@extends('layouts.app')

@section('titulo')
    Mi pedido
@endsection

@section('contenido')

    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 600px;">
            <div class="card-body text-center">
                <h2 class="card-title text-success fw-bold">Estado de tus Pedidos</h2>

                @if($pedidos->isEmpty())
                    <p class="text-muted">No tienes pedidos en este momento.</p>
                @else
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>ID del Pedido</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                    <tr>
                                        <td>{{ $pedido->id }}</td>
                                        <td>${{ number_format($pedido->total, 2) }}</td>
                                        <td>{{ ucfirst($pedido->estado) }}</td>
                                        <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
