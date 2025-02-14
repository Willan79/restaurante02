@extends('layouts.app_admin')

@section('titulo')
    - Nuevo plato
@endsection

@section('contenido')
    <div class="container mt-5 w-50">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-primary fw-bold">Nuevo Plato</h2>

        <form action="{{ route('nuevoplato') }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
            @csrf <!-- Token de seguridad -->

            <!-- Categoría -->
            <div class="mb-3">
                <label for="categoria" class="form-label fw-semibold">Categoría</label>
                <select id="categoria" name="categoria" class="form-select">
                    <option value=""></option>
                    <option value="Corriente">Corriente</option>
                    <option value="Especial">Especial</option>
                    <option value="Ejecutivo">Ejecutivo</option>
                </select>
                @error('categoria')
                    <div class="alert alert-danger text-center p-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nombre del Plato -->
            <div class="mb-3">
                <label for="nombre_plato" class="form-label fw-semibold">Nombre del Plato</label>
                <input type="text" id="nombre_plato" name="nombre_plato" class="form-control" placeholder="Escribe el nombre del plato"
                    value="{{ old('nombre_plato') }}">
                @error('nombre_plato')
                    <div class="alert alert-danger text-center p-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label fw-semibold">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="2"
                    placeholder="Escribe una breve descripción del plato"></textarea>
                @error('descripcion')
                    <div class="alert alert-danger text-center p-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label fw-semibold">Precio</label>
                <input type="number" id="precio" name="precio" class="form-control"
                    placeholder="Ingresa el precio del plato" min="0" step="0.01" value="{{ old('precio') }}">
                @error('precio')
                    <div class="alert alert-danger text-center p-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label fw-semibold">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
                @error('imagen')
                    <div class="alert alert-danger text-center p-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cantidad Disponible -->
            <div class="mb-3">
                <label for="cantidadDisponible" class="form-label fw-semibold">Cantidad Disponible</label>
                <input type="number" id="cantidadDisponible" name="cantidadDisponible" class="form-control"
                    placeholder="Ingresa la cantidad disponible" min="1" value="{{ old('cantidadDisponible') }}">
                @error('cantidadDisponible')
                    <div class="alert alert-danger text-center p-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botón de Enviar -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection
