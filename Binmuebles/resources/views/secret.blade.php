<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD de clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD de Clientes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/client">Agregar Cliente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/client/create">Mostrar Clientes</a>
                    </li>
                    <li class="nav-item ml-auto text-danger">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container text-center py-5">
        <h1 class="display-4 mb-4">Clientes</h1>
        <img src="{{ asset('img/logo.png') }}" alt="Logo de la Empresa" class="img-fluid mb-4 animate__animated animate__bounce">
        
        <div class="mb-5">
            <h2>Información General</h2>
            <p>Cifuentes Consultoria Empresarial es una empresa con más de 10 años de experiencia en el mercado. Durante este tiempo, hemos ayudado a numerosas empresas a alcanzar sus objetivos financieros y mejorar sus procesos empresariales.</p>
            <p>Nuestro equipo está compuesto por profesionales altamente capacitados y con amplia experiencia en el campo de la contabilidad y la consultoría empresarial.</p>
            <p>Estamos comprometidos con la excelencia y la satisfacción del cliente, lo que nos impulsa a seguir brindando servicios de calidad y a establecer relaciones duraderas con nuestros clientes.</p>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-i8LDVg5+Jd5j+kz2pS9LGjLobLWNp3aiak5SR2rXhj5X5TifeglfZa4nt1wZV5wP7" crossorigin="anonymous"></script>
</body>
</html>
