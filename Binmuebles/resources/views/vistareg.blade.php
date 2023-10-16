@extends('layouts.basepro')

@section('content')
    <div class="row align-items-center">
        <div class="row justify-content-end">
            <div class="col text-end">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Iniciar Sesión
                </button>
                <button type="button" class="btn btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#registroModal">
                    Registrarse
                </button>
            </div>
        </div>      
        <div class="col">
            <h2>Inmuebles</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('ter.create') }}" class="btn btn-primary">Publicar Propiedades</a>
        </div>
    </div>
    <div class="image-gallery">
        @foreach($products as $product)
        <div class="image-card">
            <p>{{$product->id}}</p>
            <h2>{{$product->nombre}}</h2>
            <p>{{$product->descripcion}}</p>
            <p>{{$product->precio}}</p>
            <p><img style="width: 100px; height: auto;" src="{{ asset('storage/images/'. $producto->demostracion) }}" alt="Demostración del producto"></p>
            <p>
                <div class="row align-items-center">
                    <div class="col">
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">editar</a>
                    </div>
                    <div class="col">
                        <form action="{{route('products.destroy',$product->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </p>
        </div>
        @endforeach
    </div>

    
</form>
@endsection
