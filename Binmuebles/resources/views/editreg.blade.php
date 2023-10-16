@extends('layouts.basepro')

@section('content')
<div id="myForm" >
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="shadow p-3 mb-5 bg-body rounded w-50 p-3 bg-light mt-5">
             <div class="d-flex justify-content-between">
                 <h2>Editar</h2>
                 <a id="salirc" class="btn btn-danger" href="{{route('products.index')}}" >Salir</a>
             </div>
             <form id="creac" class="row g-3" method="post"  action="{{route('products.update',$products->id)}}">
             
                @csrf
                @method('PUT')
     
     
                     <div class="col-md-6">
                         <label for="nombre" class="form-label">Nombre:</label>
                         <input type="text" class="form-control" id="nombre" name="nombre" value="{{$products->nombre}}"/>
                     </div>
                     <div class="col-md-6">
                         <label for="descripcion">Descripción:</label>
                         <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$products->descripcion}}"/>
                     </div>
                     <div class="col-12">
                         <label for="precio" class="form-label">Precio:</label>
                         <input type="number" class="form-control" id="precio" name="precio" value="{{$products->precio}}"/>
                     </div>
                     <div class="col-md-5">       
                         <label for="ubicacion" class="form-label">Ubicacion:</label>
                         <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{$products->ubicacion}}"/>   
                     </div>
                     <div class="col-md-5">       
                        <label for="demostracion" class="form-label">Demostracion:</label>
                        <input type="text" class="form-control" id="demostracion" name="demostracion" value="{{$products->demostracion}}"/>   
                    </div>
     
                 <button type="submit" class="btn btn-success">Submit</button>
             </form>
        </div>
     
     
       
     
     
     </div>
</div>

@endsection