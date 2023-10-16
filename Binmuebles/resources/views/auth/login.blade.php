<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
    <style>
        /* Personaliza los estilos aquí */
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            background-color: rgba(255, 140, 0, 0.2); /* Fondo naranja suave */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .login-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .login-title:hover {
            transform: scale(1.1);
        }

        h2 {
            color: #ff8c00; /* Texto naranja */
        }

        .form-control {
            border: 1px solid #ff8c00; /* Bordes naranjas */
        }

        .btn-primary {
            background-color: #ff8c00; /* Botón naranja */
            color: #fff; /* Texto blanco */
        }
        /* === removing default button style ===*/
        /* === removing default button style ===*/
        .buttonpma {
        margin: 0;
        height: auto;
        background: transparent;
        padding: 0;
        border: none;
        animation: r1 3s ease-in-out infinite;
        /*linear*/
        border: 7px #056bfa21 solid;
        border-radius: 14px;
        }

        /* button styling */
        .buttonpma {
        --border-right: 6px;
        --text-stroke-color: rgba(85, 87, 255, 0.78);
        --animation-color: #056bfa;
        --fs-size: 2em;
        letter-spacing: 3px;
        text-decoration: none;
        font-size: var(--fs-size);
        font-family: "Arial";
        position: relative;
        text-transform: uppercase;
        color: transparent;
        -webkit-text-stroke: 1px var(--text-stroke-color);
        }
        /* this is the text, when you hover on button */
        .hover-text {
        position: absolute;
        box-sizing: border-box;
        content: attr(data-text);
        color: var(--animation-color);
        width: 0%;
        inset: 0;
        border-right: var(--border-right) solid var(--animation-color);
        overflow: hidden;
        transition: 1.5s;
        -webkit-text-stroke: 1px var(--animation-color);
        animation: r2 2s ease-in-out infinite;
        }
        /* hover */
        .buttonpma:hover .hover-text {
        width: 100%;
        filter: drop-shadow(0 0 70px var(--animation-color))
        }

        @keyframes r1 {
        50% {
            transform: rotate(-1deg) rotateZ(-10deg);
        }
        }

        @keyframes r2 {
        50% {
            transform: rotateX(-65deg);
        }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="login-container p-4 rounded shadow animate__animated animate__fadeInDown">
                            <button data-text="Awesome" class="buttonpma">
                                <span class="actual-text">&nbsp;BINMUEBLES&nbsp;</span>
                                <span class="hover-text" aria-hidden="true">&nbsp;BINMUEBLES&nbsp;</span>
                            </button>
                            <h2 class="text-center">Inicio de Sesión</h2>
                            <form method="POST" action="{{ route('inicia-sesion') }}" class="login-form">
                                @csrf
                                <img src="{{ asset('img/logo.png') }}" alt="Logo de la Empresa" class="img-fluid mb-3">
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailInput" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordInput" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="passwordInput" name="password" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
                                    <label class="form-check-label" for="rememberCheck">Mantener sesión iniciada</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Acceder</button>
                            </form>
                            @if(Session::has('login_error'))
                            <div class="alert alert-danger mt-3">
                                {{ Session::get('login_error') }}
                            </div>
                            @endif
                            <div class="text-center mt-3">
                                ¿No tienes cuenta? <a href="{{ route('registro') }}">Regístrate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-i8LDVg5+Jd5j+kz2pS9LGjLobLWNp3aiak5SR2rXhj5X5TifeglfZa4nt1wZV5wP7" crossorigin="anonymous"></script>
</body>
</html>
