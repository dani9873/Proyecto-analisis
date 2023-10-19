@extends('layouts.basepro')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('acercadenosotros.css') }}">
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

    <section id="acercanosotros">
        <div class="container">
            <h1>Acerca de Nosotros</h1>
            <p>
                Bienvenido a BInmuebles, S.A. Somos una empresa dedicada a la publicación y gestión de bienes inmuebles.
                Nuestro objetivo es facilitar la compra, venta y alquiler de propiedades, conectando a comisionistas y
                usuarios interesados en bienes inmuebles de todo tipo.
            </p>

            <h2>Nuestra Misión</h2>
            <p>
                En BInmuebles, nuestra misión es brindar una plataforma confiable y fácil de usar que permita a nuestros
                comisionistas publicar sus propiedades de manera efectiva y a los usuarios encontrar su lugar ideal.
                Estamos comprometidos con la transparencia, la integridad y la satisfacción de nuestros clientes.
            </p>

            <h2>Equipo de Trabajo</h2>
            <p>
                Contamos con un equipo de profesionales dedicados y apasionados por el mundo de los bienes inmuebles.
                Nuestros comisionistas y gerentes están listos para ayudarte a encontrar la propiedad perfecta o a vender
                la tuya de manera eficiente.
            </p>

        </div>
    </section>
</body>
</html>
@endsection
