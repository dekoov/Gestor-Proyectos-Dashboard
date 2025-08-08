<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Dashboard') - CollabGrupitoATW</title><!-- inserción donde cada vista hija -->

    <!--  inserción donde cada vista hija -->

    <!-- Enlaces a los archivos procesados por Vite: CSS, JS, assets con hash de versión, hot-reload, etc. -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @stack('styles') <!--pilas de fragmentos que luego se colocan todos juntos para inyectar CSS o JS adicionales sin tocar el layout.-->
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navegacion desde arriba-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <i class="bi bi-kanban-fill fs-4 me-2"></i>
                <span class="fs-5">CollabPro</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('proyectos.index') }}">Proyectos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tareas.index') }}">Tareas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.index') }}">Miembros</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5 me-1"></i> {{ Auth::user()->name ?? 'Usuario' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>
                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
--}}
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-grow-1">
        <div class="container-fluid mt-4">
            <!-- Mensajes  -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Un Footer simplito -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <small>&copy; {{ date('Y') }} CollabGrupitoATW. ESPE 2025.</small>
        </div>
    </footer>

    <!-- Y de igual manera el bootstrap para el script del layout (local) -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
