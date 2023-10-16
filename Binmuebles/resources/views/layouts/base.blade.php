{{-- plantillas para todos los html y ir a boostrap --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="menu-toggle" id="holi">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <div class="logo-container">
                    <img class="logo" src="{{ asset('img/LOGO1.png') }}" alt="BienestarPlus - Cuidando de tu salud">
                </div>
                <ul class="menu-items">
                    
                </ul>
            </div>
        </div>
    </nav>
    <div id="main">
        <!-- un container  y directiva para marcar un area del layout
            donde se puede insertar contenido especifico  -->
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
     <footer>
        <p>Todos los derechos reservados &copy; Binmuebles {{ date('Y') }}</p>
    </footer>
</body>

</html>
