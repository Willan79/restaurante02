@extends('layouts.app')

@section('titulo')
    Pagos
@endsection

@section('contenido')
    <div class="container d-flex justify-content-center">
        <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
            <div class="card-body text-center">
                <h2 class="card-title text-success fw-bold">Confirmar Pago</h2>

                <div class="alert alert-primary mt-3">
                    <p class="fs-5">Total a pagar: <strong>${{ number_format($total, 2) }}</strong></p>
                </div>

                <form action="{{ route('procesar.pedido') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="metodo_pago" class="form-label">Selecciona el método de pago:</label>
                        <select name="metodo_pago" id="metodo_pago" class="form-select" required>
                            <option value="efectivo">Efectivo (contra entrega)</option>
                            <option value="nequi">Nequi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="direccion_envio" class="form-label">Dirección de Envío:</label>
                        <input type="text" name="direccion_envio" id="direccion_envio" class="form-control"
                            placeholder="Tu dirección completa y barrio" required>
                        @error('direccion_envio')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100">Confirmar Pedido</button>
                </form>

                @if (session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
