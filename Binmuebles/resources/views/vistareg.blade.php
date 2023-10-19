@extends('layouts.basepro')

@section('content')
    <div class="row align-items-center">
        <div class="row justify-content-end">
            <div class="col text-end">
                @auth
                    <!-- Si el usuario está autenticado, no mostrar los botones -->
                @else
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Iniciar Sesión
                    </button>
                    <button type="button" class="btn btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#registroModal">
                        Registrarse
                    </button>
                @endauth
            </div>
        </div>
        <div class="col">
            <h2>Inmuebles</h2>
        </div>
        <div class="col text-end">
            @auth
                @if (auth()->user()->user_type !== 'normal')
                    <a href="{{ route('ter.create') }}" class="btn btn-primary">Publicar Propiedades</a>
                @else
                    <div class="alert alert-warning mt-3">
                        No tienes permiso para publicar propiedades.
                    </div>
                @endif
            @else
                <a href="{{ route('ter.create') }}" class="btn btn-primary disabled">Publicar Propiedades</a>
            @endauth
        </div>
    </div>

    <div class="image-gallery">
        <div class="post-container">
            @foreach ($products as $producto)
                <div class="post">
                    <div class="post-header">
                        <h3>{{ $producto->nombre }}</h3>
                    </div>
                    <div class="post-content">
                        <!-- Mostrar la descripción completa -->
                        <p class="description">
                            @auth
                                {{ $producto->descripcion }}
                            @else
                                <span class="text-danger">Inicia Sesión para visualizar la descripción</span>
                            @endauth
                        </p>
                        <p class="price">Precio: <span class="price-red">{{ $producto->precio }}</span></p>
                        <p class="location">
                            <a href="{{ $producto->ubicacion }}" target="_blank">{{ $producto->ubicacion }}</a>
                        </p>
                    </div>
                    <div class="post-image">
                        <!-- Agregar el botón para abrir la vista detallada si el usuario está autenticado -->
                        @auth
                            <button class="btn btn-primary view-details" data-bs-toggle="modal" data-bs-target="#detalleModal">
                                Ver Detalles
                            </button>
                        @endauth
                        <img src="{{ asset('storage/images/' . $producto->demostracion) }}" alt="Demostración del producto" class="image-flash">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Ventana modal para la vista detallada -->
    <div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Botón para cerrar la ventana modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h3 class="modal-title" id="detalleModalLabel">Detalles de la Publicación</h3>
                </div>
                <div class="modal-body">
                    <!-- Contenido detallado de la publicación, incluyendo imagen, descripción completa y ubicación -->
                    @foreach ($products as $producto)
                        <div class="detalle-publicacion" style="display: none;">
                            <h4>Nombre: {{ $producto->nombre }}</h4>
                            <p class="descripcion-completa">Descripción: {{ $producto->descripcion }}</p>
                            <p class="ubicacion">Ubicación: {{ $producto->ubicacion }}</p>
                            <p class="demostrativa">Imagen Demostrativa.: <img src="{{ asset('storage/images/' . $producto->demostracion) }}" alt="Demostración del producto" class="image-flash"></p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="notification" id="notification">
        <button id="closeNotification" class="close-button">
            <span class="circle">
                <span class="x">X</span>
            </span>
        </button>
        ¡Inicia sesión y verifica para publicar tus propiedades!
    </div>

    <style>
        /* Estilos para la vista detallada en la ventana modal */
        .detalle-publicacion {
            text-align: center;
        }

        .detalle-publicacion img {
            max-width: 100%;
            height: auto;
        }

        .descripcion-completa {
            font-size: 1rem;
            color: #000;
        }
        /* Estilos para la publicación estilo Facebook */
    .post-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        justify-content: center; /* Centra verticalmente las publicaciones */
        align-items: center; /* Centra horizontalmente las publicaciones */
        max-width: 800px; /* Establece un ancho máximo para las publicaciones */
        margin: 0 auto; /* Centra el contenedor de las publicaciones en la pantalla */
    }

    .post {
        border: 1px solid #ddd;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        width: 100%; /* Las publicaciones ocupan todo el ancho del contenedor */
        max-width: 800px; /* Establece un ancho máximo para las publicaciones */
    }

    .post-header h3 {
        font-size: 1.5rem;
    }

    .post-content {
        font-size: 1rem;
    }

    .description {
        color: #000;
    }

    .price {
        color: #000;
        font-weight: bold;
    }

    .price-red {
        color: red;
    }

    .location {
        color: #000;
    }

    .post-image img {
        max-width: 100%;
        height: auto;
    }

        .notification {
            position: fixed;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            /* Fondo con transparencia */
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            display: none;
            text-align: center;
            /* Centra el texto */
            padding-right: 40px;
            /* Añade espacio para la "x" de cierre */
            animation: pulse 1s infinite;
            /* Agrega una animación de pulsación */
        }

        .close-button {
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 10px;
        }

        .circle {
            background-color: #000;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .x {
            font-size: 20px;
            color: #fff;
            position: relative;
        }

        /* Define la animación de pulsación */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>


    <script>
        // JavaScript para mostrar la publicación detallada en la ventana modal
        const viewDetailsButtons = document.querySelectorAll('.view-details');
                const detallePublicaciones = document.querySelectorAll('.detalle-publicacion');

                viewDetailsButtons.forEach((button, index) => {
                    button.addEventListener('click', () => {
                        // Ocultar todas las publicaciones detalladas
                        detallePublicaciones.forEach((detalle) => {
                            detalle.style.display = 'none';
                        });

                        // Mostrar la publicación detallada correspondiente
                        detallePublicaciones[index].style.display = 'block';
            });
        });


        //SIGUIENTE

        // Verifica si el usuario está autenticado
        const userIsAuthenticated = @json(auth()->check());

        // Selecciona la notificación y el botón de cierre
        const notification = document.getElementById('notification');
        const closeNotification = document.getElementById('closeNotification');

        // Muestra la notificación si el usuario no está autenticado
        if (!userIsAuthenticated) {
            notification.style.display = 'block';
        }

        // Cierra la notificación al hacer clic en el botón de cierre
        closeNotification.addEventListener('click', () => {
            notification.style.display = 'none';
        });
    </script>
@endsection
