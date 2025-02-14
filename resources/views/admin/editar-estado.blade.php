@extends('layouts.app_admin')

@section('titulo')
    - Editar estado del Pedido
@endsection

@section('contenido')
    <div class="container mt-5 col-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Editar Estado del Pedido</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update-estado', $pedido->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado del Pedido:</label>
                        <select name="estado" id="estado" class="form-select" required>
                            <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="preparación" {{ $pedido->estado == 'preparación' ? 'selected' : '' }}>Preparación</option>
                            <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                            <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                            <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            <option value="finalizado" {{ $pedido->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
