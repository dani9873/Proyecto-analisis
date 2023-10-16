<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/modificacionReg.css') }}">
    
    </style>
</head>

<body>
    <header>
        <h1>Binmueble</h1>
        <nav>
            <ul>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="#inmuebles">Inmuebles</a></li>
                <li><a href="#about">Acerca de Nosotros</a></li>
                <li><a href="#gerentes">Gerentes</a></li>
                <li><a href="#citas">Citas</a></li>
                <li>
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        Notificaciones
                    </button>
                </li>
            </ul>
            @auth
            <li class="nav-item ml-2">
                <span class="nav-link welcome-text">Hola, Bienvenido {{ Auth::user()->name }}</span>
            </li>
            <li class="nav-item">
                <span class="nav-link welcome-text">Tipo:  {{ Auth::user()->user_type }}</span>
            </li>
            <li class="nav-item ml-auto text-danger">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link">Cerrar sesión</button>
                </form>
            </li>
            @endauth
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

<footer class="footer bg-dark text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 py-3">
          <div class="mb-5 text-center">
            <a class="btn btn-outline-light" href="#" role="button">Botón 1</a>
            <a class="btn btn-outline-light" href="#" role="button">Botón 2</a>
          </div>
          <p class="text-center">Este es un texto de ejemplo para tu pie de página. Puedes cambiarlo como quieras.</p>
        </div>
      </div>
    </div>
  </footer>

<script src="{{ asset('js/registro.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>