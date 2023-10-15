<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="login-container p-4 rounded shadow animate__animated animate__fadeInDown">
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
