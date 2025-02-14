<!-- Botones -->
<div class="d-flex justify-content-center gap-2">
    <!-- Botón Agregar -->
    <form action="{{ route('carrito.add') }}" method="POST">
        @csrf
        <input type="hidden" name="plato_id" value="{{ $plato->id }}">
        <input type="hidden" name="cantidad" value="1"> <!-- Valor por defecto -->
        <button type="submit" class="btn btn-success">
            Agregar
        </button>
    </form>
    <!--  -->
    <!-- Botón Ver Detalles -->
    <input type="submit" name="cantidad">
    <button onclick="openModal({{ $plato->id }})" class="btn btn-primary">
        Detalles
    </button>
</div>
