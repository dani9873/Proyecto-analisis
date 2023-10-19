@extends('layouts.basepro')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('citas.css') }}"> <!-- Incluye el CSS de citas -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Crear Nuevo Inmueble - Binmueble</title>
</head>
<body>
    <header>
        <div class="header-container">
            <nav>
                <ul>
                    <li><a href="#public">Publicar Inmueble</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="citas-container" style="background-color: #f5f5f5; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); max-width: 500px; margin: 0 auto;">
            <form method="POST" action="{{ route('ter.store') }}" enctype="multipart/form-data" class="appointment-form" style="margin-top: 20px;">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="Casa">Casa</option>
                        <option value="Lote">Lote</option>
                        <option value="Edificio">Edificio</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Subir foto:</label>
                    <input type="file" class="form-control-file" accept="image/*" name="imagen" multiple>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control" id="estado" name="estado">
                        <option value="Alquiler">Alquiler</option>
                        <option value="Venta">Venta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ubicacion_general">Ubicación General:</label>
                    <input type="url" class="form-control" id="ubicacion_general" name="ubicacion_general" required>
                </div>
                <div class="form-group">
                    <label for="disponibilidad">Disponibilidad:</label>
                    <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" required>
                </div>
                <div class="form-group">
                    <label for="precio_venta">Precio de Venta:</label>
                    <input type="text" class="form-control" id="precio_venta" name="precio_venta" required>
                </div>
                <div class="form-group">
                    <label for="precio_alquiler">Precio de Alquiler:</label>
                    <input type="text" class="form-control" id="precio_alquiler" name="precio_alquiler" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('ter.index') }}" class="btn btn-primary" style="margin-left: 10px;">Visualizar Publicaciones</a>
            </form>
        </div>
    </main>
</body>
</html>
@endsection
