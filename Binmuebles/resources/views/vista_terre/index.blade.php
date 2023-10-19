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
                <th scope="col">Descripción</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fotos</th>
                <th scope="col">Estado</th>
                <th scope="col">Ubicación General</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Precio de Alquiler</th>
     </tr>
   </thead>
   <tbody>

    @foreach($products as $producto)  
    <tr>
      <th scope="row">{{ $producto->id }}</th>
      <td>{{ $producto->nombre }}</td>
      <td>{{ $producto->descripcion }}</td>
      <td>{{ $producto->tipo }}</td>
      <td>
         <img style="width: 250px; height: auto;" src="{{ asset('storage/images/' . $producto->imagen) }}"
             alt="Demostración del producto">
     </td>
     <td>{{ $producto->estado }}</td>
     <td>
      <a href="{{ $producto->ubicacion_general }}" target="_blank">{{ $producto->ubicacion_general }}</a>
      </td>
      <td>{{ $producto->disponibilidad }}</td>
      <td>{{ $producto->precio_venta }}</td>
      <td>{{ $producto->precio_alquiler }}</td>     
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