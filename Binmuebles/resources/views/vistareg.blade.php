@extends('layouts.basepro')

@section('content')
    
        <div class="row align-items-center">
            <div class="col">
                <h2>Inmuebles </h2>
            </div>
            <div class="col">
                <button id="nuevo" type="button" class="btn btn-outline-success float-left">Ingresar propiedad</button>
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
                                <button type="submit" class="btn btn-danger" >Borrar</a>
                            </form>
                        </div>

                    </div>
                    
                    
                </p>
                
            </div>
            @endforeach
           
            <!-- Agrega más imágenes y tarjetas de propiedades aquí -->
        </div>
        

        <div id="creacion" style="display: none;">
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">


                <div class="shadow p-3 mb-5 bg-body rounded w-50 p-3 bg-light mt-5">
                    <div class="d-flex justify-content-between">
                        <h2 >Crear Nuevo mueble</h2>
                        <a class="float-end"> <button id="salir" type="button" class="btn btn-danger">salir</button></a>
                
                    </div>
                    <form id="crea" class="row g-3" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="form-label">descripcion:</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"/>
                        </div>
                        <div class="form-group">       
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" class="form-control" id="precio" name="precio"/>   
                        </div>
                    
                        
                        <div class="form-group">       
                            <label for="ubicacion" class="form-label">Ubicacion:</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion"/>   
                        </div>
                        <div class="form-group"> 
                            <label>Subir foto</label>      
                            <input type="text" class="form-control"  name="demostracion"/>   
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    

@endsection