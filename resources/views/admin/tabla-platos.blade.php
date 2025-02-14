@extends('layouts.app_admin')

@section('titulo')
    - Platos
@endsection

@section('contenido')
    <!-- Contenido principal -->
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('nuevoplato') }}" class="btn btn-primary mb-3">Nuevo plato</a>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-warning text-center">
                    <tr>
                        <th>Código</th>
                        <th>Plato</th>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Disponibles</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platos as $plato)
                        <tr class="align-middle">
                            <td>{{ $plato->id }}</td>
                            <td>{{ $plato->nombre_plato }}</td>
                            <td>{{ $plato->categoria }}</td>
                            <td>{{ $plato->descripcion }}</td>
                            <td class="text-center">
                                <img src="{{ $plato->imagen ? asset('storage/' . $plato->imagen) : 'https://via.placeholder.com/50' }}"
                                    alt="Imagen plato" class="img-thumbnail" style="width: 50px; height: 50px;">
                            </td>
                            <td>${{ $plato->precio }}</td>
                            @if ($plato->cantidadDisponible > 0)
                                <td>{{ $plato->cantidadDisponible }}</td>
                            @endif

                            @if ($plato->cantidadDisponible < 1)
                                <td><button class="btn btn-sm btn-danger">Agotado</button></td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('editar_platos', $plato->id) }}" class="btn btn-sm btn-success mb-1">Editar</a>
                                <form action="{{ route('platos.destroy', $plato->id) }}" method="POST"
                                    onsubmit="return confirmDelete()" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas eliminar este plato?");
        }
    </script>
@endsection
