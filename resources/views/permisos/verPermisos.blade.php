@extends('permisos.plantilla')



@section('contenido')

<div class="container-fluid">

  <div class="row">
    <div class="col-2">
      <a class="btn btn-success" href="/imprimir" type="button" >Imprimir Historial Completo </a>  
    </div>
    <div class="col-3">
      <form method="POST" action="{{route('permisoo.imprimirID')}}">
        @csrf
      <input  name="idSoli" class="form-control" type="search" placeholder="Buscar por ID Solicitud" aria-label="Buscar"> <br>
      <button class="btn btn-success" type="submit" >Imprimir Solicitud</button>
      </form>
    </div>
  </div>
</div>



 <br>

<div class="container-fluid">
	<div class="col">
	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID Solicitud</th>
      <th scope="col">Motivo</th>
      <th scope="col">Hora Salida</th>
      <th scope="col">Hora Entrada</th>
         <th scope="col">Fecha Solicitante</th>
      <th scope="col">Fecha Emisión</th>
      <th scope="col">Estado</th>
      <th scope="col">Evidencia</th>
       <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   
      
   
  	@foreach($datos as $item)
     <form method="POST" action="{{route('permiso.destroy', $item->id_solicitud)}}">
      @csrf
      @method('DELETE')
    <tr>
      <th>{{$item->id_solicitud}}</th>
      <td>{{$item->motivo_permiso}}</td>
       <td>{{$item->hora_salida}}</td>
        <td>{{$item->hora_entrada}}</td>
           <td>{{$item->fecha_permiso}}</td>
      <td>{{$item->created_at}}</td>
      <td>{{$item->estado_revision}}</td>
      <td> <a href='/storage/{{$item->id_solicitud}}'>Ver PDF</a></td>
      <td><a  href="{{route('permisoo.edit', $item->id_solicitud)}}" class="btn btn-success"  
              >Modificar</a></td>

      @if($item->estado_revision == "PENDIENTE" )
       <td><button  type="submit" class="btn btn-danger"></i>Eliminar</button></td>
       @endif

    </tr>
      </form>
    @endforeach

  </tbody>
</table>

	</div>

</div>

</form>

@endsection