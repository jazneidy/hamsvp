@extends('layouts.principal')

@section('content')
{!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}

<h1>listado de documentos</h1>
<table class="ui striped celled selectable table " id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado de elementos
        <a href="{!!URL::to('documento')!!}">
        <div class="ui right floated small addCliente primary labeled icon button greenBoton">
          <i class="cubes icon"></i>Crear Elemento
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th class="collapsing">detalle</th>
      <th>Tipo documento</th>
       <th>Total movimiento</th>
      <th>Fecha realizacion</th>
      
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($elementos as $elemento)
      <tr>
        <td>
          {!! Html::decode(link_to_route('documento.edit', '<i class="large write square icon"></i>',$elemento->id, null))!!}
        </td>
        <td>{{ $elemento->tipo_doc}}</td>
        <td>{{ $elemento->total}}</td>
        <td>{{ $elemento->created_at}}</td>
        
          <td>
          @include('documento.delete')
          <a class="eli {{$elemento->id}}"> <i class="large trash outline icon" ></i></a>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop