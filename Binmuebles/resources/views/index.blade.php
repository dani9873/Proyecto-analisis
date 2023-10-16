@extends('layouts.base')

@section('content')
    <br>
    <h1>Binmuebles</h1>

    <div>
        <a href="{{ route('binmueble.create') }}" class="btn btn-success">Nuevo binmueble</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Tipo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Estado</th>
                <th scope="col">Ubicacion general</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Precio de Alquiler</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($binmuebles as $binmueble)
                <tr>
                    <th scope="row">{{ $binmueble->id }}</th>
                    <td>{{ $binmueble->nombre }}</td>
                    <td>{{ $binmueble->descripcion }}</td>
                    <td>{{ $binmueble->tipo }}</td>
                    <td>{{ $binmueble->imagen }}</td>
                    <td>{{ $binmueble->estado }}</td>
                    <td>{{ $binmueble->ubicacion_general }}</td>
                    <td>{{ $binmueble->disponibilidad }}</td>
                    <td>{{ $binmueble->precio_venta }}</td>
                    <td>{{ $binmueble->precio_alquiler }}</td>
                    <td>
                        <a href="{{ route('binmueble.edit', $binmueble->id) }}" class="btn btn-success">Editar</a>
                        <br />
                        <form action="{{ route('binmueble.destroy', $binmueble->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
