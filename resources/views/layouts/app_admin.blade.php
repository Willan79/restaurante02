@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asaderopp @yield('titulo')</title>
</head>
<body>
    <div>
        <header class="p-2 border-bottom bg-primary fixed-top w-100 z-50 shadow">
            <h2 class="text-center display-5 fw-bold">Panel admin @yield('titulo')</h2>
        </header>

        <div class="d-flex min-vh-100">
            <!-- Barra lateral -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark text-white p-3 position-fixed h-100">
                <ul class="nav flex-column " style="padding-top: 100px;">
                    <li class="nav-item mb-2">
                        <a href="/" class="btn btn-outline-secondary w-100 g-20">

                            <i class="bi bi-house-door-fill "></i> Inicio
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin') }}" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-speedometer2 "></i> Panel
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('tabla-platos') }}" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-duffle "></i> Platos

                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('tabla-pedidos') }}" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-bag-fill "></i> Pedidos
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('tabla-user') }}" class="btn btn-outline-secondary w-100">
                            <i class="bi bi-people-fill "></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="padding-top: 80px; margin-left: 80px;">@yield('contenido')</main>
        </div>
    </div>
</body>
</html>
