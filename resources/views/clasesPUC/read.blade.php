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
    <div class="active section">Cuentas</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
   Cuentas
  </h2>
  <div class="ui divider"></div>

 <table class="ui striped celled selectable table " id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado de Cuentas
        <a href="{!!URL::to('/ClasesPUC/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button greenBoton">
          <i class="cubes icon"></i>Crear Cuenta
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th>Codigo</th>
      <th>Nombre Cuenta</th>
      <th>Naturaleza</th>
      <th>Berneficiario</th>
      <th>Descripcion</th>     
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($ClasesPuc as $ClasesPUC)
      <tr>
        <td>
          {!! Html::decode(link_to_route('ClasesPUC.edit', '<i class="large write square icon"></i>',$ClasesPUC->id, null))!!}
        </td>
        <td>{{ $ClasesPUC->codigo}}</td>
        <td>{{ $ClasesPUC->nombreCuenta}}</td>
        <td>{{ $ClasesPUC->naturaleza}}</td>
        <td>{{ $ClasesPUC->beneficiario}}</td>
        <td>{{ $ClasesPUC->descripcion}}</td>
        
         
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

