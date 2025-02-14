@extends('layouts.app')

@section('contenido')
<div class="container d-flex justify-content-center align-items-center ">
    <div class="card shadow-lg p-2 col-md-10 col-lg-6">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Inicio de sesión</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Token de seguridad -->

                @if (@session('mensaje'))
                    <div class="alert alert-danger text-center">{{ session('mensaje') }}</div>
                @endif

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" />
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Mantener mi sesión abierta</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">¿No estás registrado?</span>
                    <a href="{{ route('register') }}" class="text-primary">Regístrate aquí</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>
        </div>
    </div>
</div>
@endsection
