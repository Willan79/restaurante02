@extends('layouts.app')

@section('contenido')
    <div class="container d-flex justify-content-center">

        <div class="card p-2 shadow-lg col-md-12 col-lg-6">
            <div class="d-flex justify-content-center mb-2">
                <img src="{{ asset('img/Mi-logo.png') }}" class="img-fluid " alt="Logo" style="max-height: 50px;">
                <h2 class="text-center">Registro</h2>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf <!-- Token de seguridad -->

                <!-- Nombre -->
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Nombre" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Apellido -->
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido"
                            name="apellido" placeholder="Apellido" value="{{ old('apellido') }}">
                    </div>
                    @error('apellido')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Dirección -->
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion"
                            name="direccion" placeholder="Dirección Completa" value="{{ old('direccion') }}">
                    </div>
                    @error('direccion')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono"
                            name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
                    </div>
                    @error('telefono')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <div class="d-flex align-items-center gap-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Contraseña">
                    </div>

                    @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-3">
                    <div class="d-flex align-items-center ">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña">
                    </div>
                </div>

                <!-- Botón de enviar -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Crear Cuenta</button>
                </div>
            </form>
        </div>
    </div>
@endsection
