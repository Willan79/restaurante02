@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Asaderopp @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/platos.css') }}">

</head>

    <body class="bg-info"> <!-- Fondo de color azul claro -->
        <div class="position-relative min-vh-100"> <!-- Contenedor principal que ocupa toda la altura de la pantalla -->
            <!-- Navbar -->
            <header class="bg-primary fixed-top shadow"> <!-- Barra de navegación fija en la parte superior con sombra -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary"> <!-- Navbar responsivo con Bootstrap -->
                    <div class="container"> <!-- Contenedor para centrar contenido y mantener un margen -->

                        <!-- Logo -->
                        <a class="navbar-brand d-flex align-items-center" href="/"> <!-- Enlace al inicio con icono y logo -->
                            <i class="bi bi-duffle fs-2 me-2"></i> <!-- Ícono decorativo -->
                            <img class="img-fluid" alt="Logo" style="max-height: 50px;"> <!-- Logo con altura máxima de 50px -->
                        </a>

                        <!-- Botón para móviles -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#menuNavegacion"> <!-- Botón para desplegar el menú en móviles -->
                            <span class="navbar-toggler-icon"></span> <!-- Icono del botón -->
                        </button>

                        <!-- Menú de navegación -->
                        <div class="collapse navbar-collapse md-w-60" id="menuNavegacion"> <!-- Contenedor colapsable del menú -->
                            <ul class="navbar-nav ms-auto d-flex align-items-center gap-2"> <!-- Lista de enlaces alineados a la derecha -->

                                @auth <!-- Sección para usuarios autenticados -->
                                    <li class="nav-item text-light fw-bold"> <!-- Mensaje de bienvenida -->
                                        Hola, {{ auth()->user()->name }}
                                    </li>
                                    <li class="nav-item"> <!-- Icono del carrito de compras con contador -->
                                        <a href="{{ route('carrito.index') }}"
                                            class="btn btn-outline-info position-relative">
                                            <i class="bi bi-cart fs-4"></i>
                                            <span
                                                class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                                {{ $totalPlatos }} <!-- Muestra el total de platos en el carrito -->
                                            </span>
                                        </a>
                                    </li>
                                    @if (auth()->user()->role === 'user') <!-- Verifica si el usuario es un cliente -->
                                        <li class="nav-item"><a href="{{ route('ver-pedido') }}"
                                                class="btn btn-outline-info">Pedido</a></li>
                                    @endif
                                    @if (auth()->user()->role === 'admin') <!-- Verifica si el usuario es administrador -->
                                        <li class="nav-item"><a href="{{ route('admin') }}"
                                                class="btn btn-outline-info">Admin</a></li>
                                    @endif
                                    <li class="nav-item"><a href="/" class="btn btn-outline-info">Inicio</a></li>
                                    <li class="nav-item"><a href="{{ route('menu') }}" class="btn btn-outline-info">Menú</a>
                                    </li>
                                    <li class="nav-item"> <!-- Botón para cerrar sesión -->
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger">Salir</button>
                                        </form>
                                    </li>
                                @endauth

                                @guest <!-- Sección para usuarios no autenticados -->
                                    <li class="nav-item"><a href="/" class="btn btn-outline-info">Inicio</a></li>
                                    <li class="nav-item"><a href="{{ route('menu') }}" class="btn btn-outline-info">Menú</a>
                                    </li>
                                    <li class="nav-item"><a href="{{ route('login') }}"
                                            class="btn btn-outline-info">Login</a></li>
                                    <li class="nav-item"><a href="{{ route('register') }}"
                                            class="btn btn-outline-info">Registrarte</a></li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

            <!-- Contenido principal -->
            <main class=" m-2 pt-5 d-flex flex-column min-vh-100"> <!-- Sección principal con margen superior -->
                <h2 class="text-center display-5 fw-bold mt-4">@yield('titulo')</h2> <!-- Título dinámico -->
                @yield('contenido') <!-- Contenido dinámico de cada página -->
            </main>

            <!-- Footer -->
            <footer class="text-center p-4 text-light bg-dark mt-4 position-relative"> <!-- Pie de página con fondo oscuro -->
                Tu Restaurante - Todos los derechos reservados {{ now()->year }} <!-- Mensaje de derechos de autor -->
            </footer>
        </div>
    </body>

</html>
