@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>La mesa del bonsaí @yield('titulo')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/platos.css') }}">
</head>

<body> <!--  -->
    <div class="position-relative min-vh-100"> <!-- Contenedor principal que ocupa toda la altura de la pantalla -->
        <!-- Navbar -->
        <header class="header-app fixed-top shadow"> <!-- Barra de navegación fija en la parte superior con sombra -->
            <nav class="navbar navbar-expand-lg navbar-dark"> <!-- Navbar responsivo con Bootstrap -->
                <div class="container"> <!-- Contenedor para centrar contenido y mantener un margen -->

                    <!-- Logo -->
                    <!-- Enlace al inicio con icono y logo -->
                    <div class="d-flex align-items-end ">
                        <img src="{{ asset('img/Mi-logo.png') }}" class="img-fluid " alt="Logo"
                            style="max-height: 60px;"> <!-- Logo con altura máxima de 50px -->
                        <p class="text-muted fst-italic fs-5">Restaurante</p>
                    </div>

                    <!-- Botón para móviles -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#menuNavegacion"> <!-- Botón para desplegar el menú en móviles -->
                        <span class="navbar-toggler-icon"></span> <!-- Icono del botón -->
                    </button>
                    <!-- Menú de navegación -->
                    <div class=" collapse navbar-collapse md-w-60" id="menuNavegacion">
                        <!-- Contenedor colapsable del menú -->
                        <ul class="navbar-nav ms-auto d-flex align-items-center">
                            <!-- Lista de enlaces alineados a la derecha -->

                            @auth <!-- Sección para usuarios autenticados -->
                                <li class="nav-item text-light fw-bold"> <!-- Mensaje de bienvenida -->
                                    Hola, {{ auth()->user()->name }}
                                </li>
                                <li class="nav-item"> <!-- Icono del carrito de compras con contador -->
                                    <a href="{{ route('carrito.index') }}" class=" position-relative">
                                        <i class="bi bi-cart fs-4"></i>
                                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                            {{ $totalPlatos }} <!-- Muestra el total de platos en el carrito -->
                                        </span>
                                    </a>
                                </li>
                                @if (auth()->user()->role === 'user')
                                    <!-- Verifica si el usuario es un cliente -->
                                    <li class="nav-item"><a href="{{ route('ver-pedido') }}" class="">Pedido</a></li>
                                @endif
                                @if (auth()->user()->role === 'admin')
                                    <!-- Verifica si el usuario es administrador -->
                                    <li class="nav-item"><a href="{{ route('admin') }}" class="">Admin</a></li>
                                @endif
                                <li class="nav-item"><a href="/" class="">Inicio</a></li>
                                <li class="nav-item"><a href="{{ route('menu') }}" class="">Menú</a>
                                </li>
                                <li class="nav-item"> <!-- Botón para cerrar sesión -->
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Salir</button>
                                    </form>
                                </li>
                            @endauth

                            @guest <!-- Sección para usuarios no autenticados -->
                                <li class="nav-item"><a href="/" class="">Inicio</a></li>
                                <li class="nav-item"><a href="{{ route('menu') }}" class="">Menú</a>
                                </li>
                                <li class="nav-item"><a href="{{ route('login') }}" class="">Login</a></li>
                                <li class="nav-item"><a href="{{ route('register') }}" class="">Registrarte</a></li>
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
        <footer class="text-center text-light p-4 mt-4 position-relative">
            <!-- Sección de contacto -->
            <div class="mt-4 p-4 rounded text-center">
                <h3 class="fw-bold">Contáctanos</h3>
                <p class="fs-5">Haz tu pedido ahora o visítanos en nuestro restaurante, en la Calle
                    xxxxxxxxx, Barrio
                    xxxxxxxxx.</p>
                <p class="fs-5">Pide más información al <strong>xxxxxxxxx</strong></p>
                <p class="fs-5">Email: xxxxxxxxx@hotmail.com</p>

            </div>
            <!-- Pie de página con fondo oscuro -->
            <p class="text-secondary">
                Restaurante La Mesa del bonsaí - Todos los derechos reservados {{ now()->year }}
            </p>
        </footer>
    </div>
</body>

</html>
