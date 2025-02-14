@extends('layouts.app_admin')

@section('titulo')
    - Detalles Pedidos
@endsection

@section('contenido')
    <div class="container mt-3 col-md-5">
        <div class="card shadow ">
            <div class="card-body">
                <h2 class="card-title">Detalles del Pedido</h2>

                <div class="bg-light rounded mb-1">
                    <h3 class="h5">Información del Cliente</h3>
                    <p><strong>Cliente:</strong> {{ $pedido->user->name }} {{ $pedido->user->apellido }}</p>
                    <p><strong>Dirección de Envío:</strong> {{ $pedido->direccion_envio }}</p>
                    <p><strong>Teléfono:</strong> {{ $pedido->user->telefono }}</p>
                    <p><strong>Método de Pago:</strong> {{ ucfirst($pedido->metodo_pago) }}</p>
                    <p><strong>Total:</strong> ${{ number_format($pedido->total, 2) }}</p>
                    <p><strong>Estado del Pedido:</strong> {{ ucfirst($pedido->estado) }}</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Plato</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido->detalles as $detalle)
                                <tr>
                                    <td>{{ $detalle->plato->nombre_plato }}</td>
                                    <td>{{ $detalle->cantidad }}</td>
                                    <td>${{ number_format($detalle->precio, 2) }}</td>
                                    <td>${{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-1">
                    <a href="{{ route('tabla-pedidos') }}" class="btn btn-secondary">Volver a la Lista de Pedidos</a>
                </div>
            </div>
        </div>
    </div>
@endsection
