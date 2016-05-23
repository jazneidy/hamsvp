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
    <div class="active section">Activos Fijos</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
  Activos Fijos
  </h2>
  <div class="ui divider"></div>

 <table class="ui striped celled selectable table " id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
         Activos Fijos
        <a href="{!!URL::to('/activosFijos/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button greenBoton">
          <i class="cubes icon"></i>Crear Depreciasion
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th>Elemento</th>
      <th>An&ntilde; Uso</th>
      <th>Vida Util</th>
      <th>Depreciasion</th>
      <th>Descripcion</th> 
             
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($ActivosFijos as $ActivosFijos)
      <tr>
        <td>
          {!! Html::decode(link_to_route('activosFijos.edit', '<i class="large write square icon"></i>',$ActivosFijos->id, null))!!}
        </td>
        <td>{{ $ActivosFijos->elemento_id}}</td>
        <td>{{ $ActivosFijos->anosUso}}</td>
        <td>{{ $ActivosFijos->vidaUtil}}</td>
        <td>{{ $ActivosFijos->depreciacion}}</td>
        <td>{{ $ActivosFijos->descripcion}}</td>
        
        <td>
          @include('activosFijos.delete')
          <a class="eli {{$ActivosFijos->id}}"> <i class="large trash outline icon" ></i></a>
        </td>
              
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

