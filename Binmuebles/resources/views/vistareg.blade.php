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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Fotos</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $producto)
                        <tr>
                            <th scope="row">{{ $producto->id }}</th>
                            <td>{{ $producto->nombre }}</td>
                            <td>
                                @auth
                                    {{ $producto->descripcion }}
                                @else
                                    <span class="text-danger">Inicia Sesión para visualizar la descripción</span>
                                @endauth
                            </td>
                            <td>{{ $producto->precio }}</td>
                            <td>
                                <a href="{{ $producto->ubicacion }}" target="_blank">{{ $producto->ubicacion }}</a>
                            </td>
                            <td>
                                <img style="width: 100px; height: auto;" src="{{ asset('storage/images/' . $producto->demostracion) }}" alt="Demostración del producto">
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
