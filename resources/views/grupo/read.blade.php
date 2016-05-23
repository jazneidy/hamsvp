@extends('layouts.principal')
@section('content')

@if(Session::has('mensaje'))
      <div class="ui green floating icon message">
      <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Proceso Exitoso!.  
        </div>
        <div>&nbsp; El registro se {{Session::get('mensaje')}} <b>correctamente</b>.</div>
      </div>
    @endif

  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Grupos</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
   Grupos
  </h2>
  <div class="ui divider"></div>

  

 <table class="ui striped celled selectable table " id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado De Grupos
        <a href="{!!URL::to('/grupos/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button greenBoton">
          <i class="cubes icon"></i>Crear Grupo
        </div>
        </a>

      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($grupos as $grupo)
      <tr>
        <td>
          {!! Html::decode(link_to_route('grupos.edit', '<i class="large write square icon"></i>',$grupo->id, null))!!}
        </td>
        <td>{{ $grupo->nombre}}</td>
        <td>{{ $grupo->descripcion}}</td>
        
          <td>
          @include('grupo.delete')
          <a class="eli {{$grupo->id}}"> <i class="large trash outline icon" ></i></a>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

