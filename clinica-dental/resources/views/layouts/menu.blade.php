<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'dental') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- Styles -->
        <!-- Styles -->
<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    #app {
        display: flex;
        flex-grow: 1;
        flex-direction: row;
    }

    .sidebar {
        width: 250px;
        background-color: #f8f9fa;
        padding: 20px;
        position: fixed;
        top: 80px; /* Ajusta la posición debajo de la navbar */
        bottom: 0;
        height: calc(100% - 70px); /* Ajusta la altura según la navbar */
        overflow-y: auto;
    }

    .content {
        margin-left: 250px;
        margin-top: 90px; /* Ajusta el margen superior para la navbar */
        width: calc(100% - 250px);
        padding: 20px;

    }

    .sidebar a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: #333;


    }

    .sidebar a:hover {
        background-color: #351663;
        color: #00AEB1;
    }

    .navbar {
        position: fixed;
        top: 0;
        left: 0; /* Comienza desde el borde izquierdo de la pantalla */
        width: 100%; /* Ocupar todo el ancho de la pantalla */
        z-index: 1000;
        height: 80px;
        display: flex;
        align-items: center;
        padding-left: 20px;
        background-color: #f8f9fa;
    }

    /* Ajuste de las imágenes del navbar */
    .navbar img {
        margin-right: 15px; /* Añade margen entre la imagen y otros elementos */
        margin-bottom: -22px; /* Mueve las imágenes hacia abajo */
    }

    .navbar-collapse {
        display: flex;
        justify-content: flex-end; /* Alinea el contenido del navbar a la derecha */
    }

    .navbar .user-avatar {
        display: flex;
        align-items: center;

    }

    .user-avatar img {
        border-radius: 80%;
        margin-right: 50px;
        width: 35px;
        height: 35px;
        margin-bottom: 15px; /* Añade un margen inferior a la imagen de usuario */
        margin-right: 15px; /* Añade margen entre la imagen y otros elementos */
        margin-bottom: -10px; /* Mueve las imágenes hacia abajo */

    }

    /* Ajustar para centrar imágenes verticalmente */
    .media.align-items-center {
        display: flex;
        align-items: center;
    }

    .dropdown-menu {
        position: absolute;
        right: 0;
        text-decoration: none;
        background-color: #eceef0;
        color: white;


    }
</style>


</head>
<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Menú</h4>
            <a href="{{ url('/home') }}">Inicio</a>
            <a href="{{ url('/admin/create-user') }}">Agregar Usuario</a>
            <a href="{{ url('/admin/manage-users') }}">Gestionar Usuarios</a>
            <a href="{{ url('/admin/especialidades') }}">Especialidades</a>
            <a href="{{ url('/admin/new-patient') }}">Nuevo Paciente</a>
            <a href="{{ url('/admin/new-doctor') }}">Nuevo Médico</a>
            <a href="{{ url('/admin/consent') }}">Consentimiento Informado</a>
            <a href="{{ url('/admin/backup') }}">Respaldo</a>
        </div>

        <!-- Main Content Area -->
        <div class="w-100">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-violet shadow-sm">
                <div class="container">
                    <!-- Imagen fija general -->
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                          <img  src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="100">
                        </span>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto user-avatar">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <!-- Imagen fija del usuario -->
                                    <div class="media align-items-center">
                                        <span class="avatar avatar-sm rounded-circle">
                                          <img  src="{{ asset('img/logo1.png') }}" alt="Logo" width="100" height="100">
                                        </span>
                                    </div>                                    <!-- Fin imagen fija del usuario -->

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="content py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
