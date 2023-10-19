@extends('layouts.basepro')
@section('content')
<h1>BIENES RAICES</h1>


<div>
   <a href="{{route('ter.create')}}" class="btn btn-success" >Agregar inmueble</a>
</div>
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

    @foreach($products as $producto)  
    <tr>
        <th scope="row">{{$producto->id}}</th>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->descripcion}}</td>
        <td>{{$producto->precio}}</td>

        <td>
         <a href="{{ $producto->ubicacion }}" target="_blank">{{ $producto->ubicacion }}</a>
         </td>
        <td>
         <img style="width: 100px; height: auto;" src="{{ asset('storage/images/'. $producto->demostracion) }}" alt="Demostración del producto">

         <td>
         <a href="{{route('ter.edit',$producto->id)}} " class="btn btn-primary" >Editar</a>
         <form action="{{route('ter.destroy',$producto->id)}}" method="post" class="d-inline">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger" >Borrar</a>
         </form>

        </td>

    </tr>
@endforeach

</tbody>
</table>
@endsection