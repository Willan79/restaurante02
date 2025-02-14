<div  >
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

    <div class=" text-center">
        <div class="row">
            @foreach ($platos as $plato)
                <div class=" col-md-4 col-lg-3">
                    <div class="card mb-2">
                        <img class="card-img-top" src="{{ asset('storage/' . $plato->imagen) }}"
                            alt="{{ $plato->nombre_plato }}">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $plato->nombre_plato }}</h5>
                            <p class="text-muted fw-semibold"><strong>Precio</strong> ${{ number_format($plato->precio, 2) }}</p>
                            <p class="text-sm d-none">{{ $plato->cantidadDisponible }}</p>

                            <!-- Botones -->
                            <div class="d-flex gap-2 align-items-center justify-content-center">
                                @if ($plato->cantidadDisponible < 1)
                                    <button class="btn btn-danger mb-3">
                                        <strong>Agotado</strong>
                                    </button>
                                @endif

                                <!-- Botón Agregar -->
                               @if ($plato->cantidadDisponible > 0)
                                    <form action="{{ route('carrito.add') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="plato_id" value="{{ $plato->id }}">
                                        <input type="hidden" name="cantidad" value="1"> <!-- Valor por defecto -->
                                        <button type="submit" class="btn btn-outline-success">
                                            <strong>Agregar</strong>
                                        </button>
                                    </form>
                                @endif
                                <!-- Botón para abrir el modal -->
                                <button type="button" class="btn btn-outline-primary mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modalInfo" data-id="{{ $plato->id }}">
                                    <strong>Detalles</strong>
                                </button>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@include('components.modal_detalles')
