@extends('layouts.principal')



@section('content')



  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Ver Inventario</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
    Inventarios
  </h2>
  <div class="ui divider"></div>

   @if(Session::has('mensaje'))
      <div class="ui green floating icon message">
      <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Accion Procesada!.  
        </div>
        <div>&nbsp; El registro se {{Session::get('mensaje')}} <b>exitosamente</b>.</div>
      </div>
    @endif

 <table class="ui striped celled selectable table blue" id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado de inventarios
        <a href="{!!URL::to('/inventario/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button">
          <i class="cubes icon"></i>Registro de Entrada
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th>Producto</th>
      <th>Disponible</th>
      <th class="collapsing">Detalle</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($productosInventario as $inventario)
      <tr>
        <td>{{ $inventario->nombre}}</td>
        <td>{{ $inventario->cantidad}}</td>
        <td>
          {!! Html::decode(link_to_route('inventario.edit', '<i class="large unhide icon"></i>',$inventario->producto_id, null))!!}
          
        </td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

