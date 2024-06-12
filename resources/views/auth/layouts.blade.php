<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MythicTarot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Shrikhand&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ URL('/') }}">
                <img src="{{ asset('css/logo.png') }}" alt="MythicTarot Logo" style="height: 100px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link menu {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}" href="{{ route('welcome') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu {{ Route::currentRouteName() == 'tienda.index' ? 'active' : '' }}" href="{{ route('tienda.index') }}">Tienda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu {{ Route::currentRouteName() == 'tarot' ? 'active' : '' }}" href="{{ route('tarot') }}">Tarot</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu {{ Route::currentRouteName() == 'aboutUs' ? 'active' : '' }}" href="{{ route('aboutUs') }}">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu {{ Route::currentRouteName() == 'faqs' ? 'active' : '' }}" href="{{ route('faqs') }}">FAQs</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link login {{ Route::currentRouteName() == 'login' ? 'active' : '' }}" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link register {{ Route::currentRouteName() == 'register' ? 'active' : '' }}" href="{{ route('register') }}">Registrarse</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link login dropdown-toggle login_user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('perfil') }}">
                                    Perfil
                                </a>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @include('partials.flash-messages')
        @yield('content')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <footer class="footer-area">
        <div class="container text-center">
            <a href="{{ route('terms') }}" class="footer-link">Términos y Condiciones</a>
            <a href="{{ route('cookies') }}" class="footer-link">Política de Cookies</a>
            <a href="{{ route('contact') }}" class="footer-link">Contacto</a>
            <div class="contact-logos">
                <a href="https://www.whatsapp.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            </br>
            <p>@2024 Ana Montes de Ory</p>
        </div>
    </footer>
</body>

</html>
