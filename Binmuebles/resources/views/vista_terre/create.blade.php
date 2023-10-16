@extends('layouts.basepro')
@section('content')
<div>
    <a href="{{ route('ter.index') }}" class="btn btn-primary">Regresar a Index</a>
</div>

<h2>Crear nuevo inmueble</h2>

<div class="col-3">
    <form method="POST" action="{{ route('ter.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre"/>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion"/><br/>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio"/>
        </div>
        <div class="form-group">       
            <label for="ubicacion">Ubicación</label>
            <input type="url" class="form-control" id="ubicacion" name="ubicacion"/>   
        </div>

        <div class="form-group"> 
            <label>Subir foto</label>      
            <input type="file" class="form-control-file" accept="storage/app/public/images/*" name="demostracion" multiple/>   
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection