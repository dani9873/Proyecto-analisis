@extends('layouts.basepro')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('citas.css') }}"> <!-- Incluye el CSS de citas -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Binmueble - Binmueble</title>
</head>
<body>
    <header>
        <div class="header-container">
            <nav>
                <ul>
                    <li><a href="#edit-public">Editar Publicación del Inmueble</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="citas-container" style="background-color: #f5f5f5; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); max-width: 500px; margin: 0 auto;">
            <h2>Editar Binmueble</h2>
            <form method="post" action="{{ route('ter.update', $product->id) }}" enctype="multipart/form-data" class="appointment-form" style="margin-top: 20px;">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $product->nombre }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $product->descripcion }}" required>
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="{{ $product->precio }}" required>
                </div>
                <div class="form-group">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="url" class="form-control" id="ubicacion" name="ubicacion" value="{{ $product->ubicacion }}" required>
                </div>
                <div class="form-group">
                    <label for="demostracion">Subir Fotos:</label>
                    <input type="file" class="form-control-file" id="demostracion" name="demostracion" value="{{ $product->demostracion }}" accept="image/*" multiple>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('ter.index') }}" class="btn btn-primary" style="margin-left: 10px;">Regresar</a>
            </form>
        </div>
    </main>
</body>
</html>
@endsection
