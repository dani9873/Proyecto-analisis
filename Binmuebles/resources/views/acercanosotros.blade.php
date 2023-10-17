@extends('layouts.basepro')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('acercadenosotros.css') }}"> <!-- Puedes crear un archivo de estilos específico para esta página -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Acerca de Nosotros - Binmueble</title>
</head>
<body>
    <header>
        <div class="header-container">
            <nav>
                <ul>
                    <li><a href="#acercanosotros">Acerca de Nosotros</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="acercanosotros" class="container">
        <div class="acercanosotros-container" style="text-align: center;">
            <h1>Acerca de nosotros</h1>
            <p>Somos una empresa ficticia dedicada a brindar soluciones tecnológicas innovadoras.</p>
            <p>Nuestro equipo está compuesto por profesionales apasionados por la tecnología y comprometidos con la excelencia.</p>
            <p>¡Contáctanos para conocer más sobre nuestros servicios y proyectos!</p>
            <div class="acercanosotros-logo">
                <img src="{{ asset('img/LOGO.png') }}" alt="Logo de la Empresa" style="max-width: 150px;">
            </div>
        </div>
    </main>
</body>
</html>
@endsection
