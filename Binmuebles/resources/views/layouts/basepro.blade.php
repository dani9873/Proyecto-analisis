<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Binmueble</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/modificacionReg.css') }}">
</head>

<body>
    <header>
        <div class="d-flex justify-content-center align-items-center">
            <h1>Binmueble</h1>
            <img src="{{ asset('img/LOGO.png') }}" alt="Logo de la Empresa" style="max-width: 150px;">
        </div>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFEBCD;">
            <div class="container">
                <a class="navbar-brand" href="{{ route('products.index') }}">Binmueble</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                        </li>
                        @auth
                        @if (Auth::user()->user_type !== 'normal')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ter.index') }}">Inmuebles</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('acercanosotros') }}">Acerca de Nosotros</a>
                        </li>
                            @if (Auth::user()->user_type !== 'normal')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('citas') }}">Citas</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <span class="nav-link welcome-text">Hola, Bienvenido {{ Auth::user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <span class="nav-link welcome-text">Tipo: {{ Auth::user()->user_type }}</span>
                            </li>
                            <li class="nav-item ml-auto">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-danger">Cerrar sesión</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="search-bar">
            <input type="text" placeholder="Buscar propiedades">
            <button>Buscar</button>
        </div>
    </header>
    <main class="flex-fill">
        @yield('content')
    </main>
    <!-- Modal para Iniciar Sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl"> <!-- Aquí se aplica la clase modal-xl -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido de la vista de inicio de sesión, por ejemplo: -->
                    @include('auth.login')
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Registrarse -->
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl"> <!-- Aquí se aplica la clase modal-xl -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registroModalLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido de la vista de registro, por ejemplo: -->
                    @include('auth.register')
                </div>
            </div>
        </div>
    </div>

</body>

<footer class="footer bg-dark text-white mt-7">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-3">
                <div class="mb-5 text-center">
                    <a class="btn btn-outline-light" href="https://www.facebook.com" role="button">
                        <i class="fab fa-facebook"></i> Facebook
                    </a>
                    <a class="btn btn-outline-light" href="https://www.instagram.com" role="button"
                        style="background: linear-gradient(to right, #405de6, #5851db, #833ab4, #c13584, #e1306c);">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <a class="btn btn-outline-light" href="https://www.twitter.com" role="button">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                </div>
                <p class="text-center">Bienvenido a Binmueble. Somos líderes en el mercado de bienes raíces.
                    Nuestra misión es ayudarte a encontrar el inmueble perfecto para tus necesidades.
                    ¡Contáctanos hoy mismo!</p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/registro.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</body>

</html>
