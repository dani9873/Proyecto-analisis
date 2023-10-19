@extends('layouts.basepro')


@section('content')
<div>
   <h2>Editar Binmueble</h2>
   <div>
       <a href="{{route('ter.index')}}" class="btn btn-primary" >Regresar</a>
   </div>


   <div class="col-3">
      <form method="post" action="{{route('ter.update',$product->id)}}">
      
       @csrf
       @method('PUT')


       <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$product->nombre}}">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$product->descripcion}}"> 
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" id="precio" name="precio" value="{{$product->precio}}">
    </div>
    <div class="form-group">       
        <label for="ubicacion">Ubicacion</label>
        <input type="url" class="form-control" id="ubicacion" name="ubicacion" value="{{$product->ubicacion}}">   
    </div>

    <div class="form-group">       
        <label for="demostracion">Subir Fotos</label>
        <input type="file" class="form-control" id="demostracion" name="demostracion" value="{{$product->demostracion}}">   
    </div>

       <button type="submit" class="btn btn-success">Actualizar</button>
     </form>
   </div>
</div>
@endsection
