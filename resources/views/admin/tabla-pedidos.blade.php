@extends('layouts.app_admin')

@section('titulo')
    - Lista de Pedidos
@endsection

@section('contenido')
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-striped shadow-sm">
                <thead class="table-warning">
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Método de Pago</th>
                        <th>Fecha del Pedido</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->id }}</td>
                            <td>{{ $pedido->user->name }} {{ $pedido->user->apellido }}</td>
                            <td>${{ number_format($pedido->total, 2) }}</td>
                            <td>
                                @if ($pedido->estado == 'pendiente')
                                    <span class="badge bg-danger p-2">{{ ucfirst($pedido->estado) }}</span>
                                @else
                                    <span class="badge bg-info p-2">{{ ucfirst($pedido->estado) }}</span>
                                @endif
                            </td>
                            <td>{{ ucfirst($pedido->metodo_pago) }}</td>
                            <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('editar-estado', $pedido->id) }}" class="btn btn-success btn-sm">Editar Estado</a>
                                <a href="{{ route('detalles-pedidos', $pedido->id) }}" class="btn btn-primary btn-sm">Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

