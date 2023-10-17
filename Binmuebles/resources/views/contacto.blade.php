@extends('layouts.basepro')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('contacto.css') }}"> <!-- Puedes crear un archivo de estilos específico para esta página -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Contacto - Binmueble</title>
</head>
<body>
    <header>
        <div class="header-container">
            <nav>
                <ul>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main id="contacto">
        <div class="contact-container" style="background-color: #f5f5f5; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); max-width: 500px; margin: 0 auto;">
            <h2>Contacto</h2>
            <div class="contact-info">
                <div class="contact-details">
                    <p>Contacto del vendedor:</p>
                    <p>Nombre: Juan Vendedor</p>
                    <p>Correo: juan@example.com</p>
                    <p>Teléfono: 123-456-7890</p>
                </div>
                <div class="contact-photo">
                    <!-- Puedes agregar aquí la foto del contacto -->
                </div>
            </div>
            <form class="contact-form" action="submit.php" method="post" style="margin-top: 20px;">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required class="form-control">
                <label for="email">Correo:</label>
                <input type="email" id="email" name="email" required class="form-control">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" required class="form-control"></textarea>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>
</body>
</html>
@endsection
