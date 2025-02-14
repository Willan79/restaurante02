@extends('layouts.app')


@section('contenido')

    <div class="d-flex flex-column flex-md-row justify-content-center gap-2">

        <!-- Sección del carrito style="width: 60%;"-->
        <div class="card shadow-lg" >
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                <h2 class="card-title text-primary text-center">Tu Carrito</h2>

                @if ($carrito && $carrito->items->count())
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-warning">
                                <tr>
                                    <th>Plato</th>
                                    <th class="w-80">Cantidad</th>
                                    <th>Precio Unidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carrito->items as $item)
                                    <tr>
                                        <!-- Nombre del plato -->
                                        <td>{{ $item->plato->nombre_plato }}</td>

                                        <!-- Formulario para actualizar la cantidad -->
                                        <td>
                                            <form action="{{ route('carrito.updateCantidad', $item->id) }}" method="POST" class="d-flex justify-content-center flex-wrap">
                                                @csrf
                                                <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1"
                                                    class="form-control text-center w-50 w-md-25 fs-5 fs-md-2">
                                                <button type="submit" class="btn btn-primary btn-sm p-1">
                                                    <i class="bi bi-arrow-repeat fs-4"></i>
                                                </button>
                                            </form>
                                        </td>


                                        <!-- Precio del plato -->
                                        <td>${{ number_format($item->precio, 2, ',', '.') }}</td>

                                        <!-- Botón para eliminar un plato del carrito -->
                                        <td>
                                            <form action="{{ route('carrito.remove', $item->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Botón para vaciar el carrito -->
                    <form action="{{ route('carrito.close') }}" method="POST" class="text-center mt-3">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Vaciar Carrito</button>
                    </form>

                    <!-- Botón para proceder al pago -->
                    <div class="text-center mt-3">
                        <a href="{{ route('confirmar-pago') }}" class="btn btn-success">Proceder al pago</a>
                    </div>
                @else
                    <div class="alert alert-danger text-center">
                        Tu carrito está vacío.
                    </div>
                @endif

            </div>
        </div>

        <!-- Sección de resumen del pedido style="width: 35%;"-->
        <div class="card shadow-lg" >
            <div class="card-body">
                <h4 class="card-title text-center text-success">Resumen del Pedido</h4>

                @if ($carrito && $carrito->items->count())
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-warning">
                                <tr>
                                    <th>Plato</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0; // Inicializamos el total del carrito
                                @endphp

                                @foreach ($carrito->items as $item)
                                    @php
                                        $subtotal = $item->cantidad * $item->precio;
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $item->plato->nombre_plato }}</td>
                                        <td>${{ number_format($subtotal, 2, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <h4 class="text-center text-dark mt-2 fw-bold">Total: ${{ number_format($total, 2, ',', '.') }}</h4>
                @endif

            </div>
        </div>

    </div>

@endsection
