@extends('layouts.app_admin')

@section('titulo')
    - Editar el plato
@endsection

@section('contenido')
    <div class="container mt-5 w-50">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('platos.update', $plato->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Método para actualizar -->

                    <!-- Categoría -->
                    <div class="mb-3">
                        <label for="categoria" class="form-label fw-bold">Categoría</label>
                        <select id="categoria" name="categoria" class="form-select">
                            <option value="Corriente" {{ $plato->categoria == 'Corriente' ? 'selected' : '' }}>Corriente</option>
                            <option value="Ejecutivo" {{ $plato->categoria == 'Ejecutivo' ? 'selected' : '' }}>Ejecutivo</option>
                            <option value="Especial" {{ $plato->categoria == 'Especial' ? 'selected' : '' }}>Especial</option>
                        </select>
                    </div>

                    <!-- Nombre del Plato -->
                    <div class="mb-3">
                        <label for="nombre_plato" class="form-label fw-bold">Nombre del Plato</label>
                        <input type="text" id="nombre_plato" name="nombre_plato" class="form-control"
                            value="{{ $plato->nombre_plato }}">
                    </div>

                    <!-- Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-bold">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control" rows="2">{{ $plato->descripcion }}</textarea>
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label fw-bold">Precio</label>
                        <input type="number" id="precio" name="precio" class="form-control"
                            value="{{ $plato->precio }}" step="0.01">
                    </div>

                    <!-- Imagen -->
                    <div class="mb-3">
                        <label for="imagen" class="form-label fw-bold">Imagen</label>
                        @if ($plato->imagen)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $plato->imagen) }}" alt="{{ $plato->nombre }}" class="img-thumbnail" style="width: 100px; height: 100px;">
                            </div>
                        @endif
                        <input type="file" id="imagen" name="imagen" class="form-control">
                    </div>

                    <!-- Cantidad Disponible -->
                    <div class="mb-3">
                        <label for="cantidadDisponible" class="form-label fw-bold">Cantidad Disponible</label>
                        <input type="number" id="cantidadDisponible" name="cantidadDisponible" class="form-control"
                            value="{{ $plato->cantidadDisponible }}" min="1">
                    </div>

                    <!-- Botón de Enviar -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
