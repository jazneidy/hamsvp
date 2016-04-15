@extends('layouts.principal')



@section('content')

<div class="ui breadcrumb">
    <a  href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/inventario')!!}" class="section">Ver Inventario</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Detalles</div>
  </div>
  <h3 class="ui header">Detalles</h3>
  <div class="ui divider"></div>

<div class="ui three column grid">
  <div class="column">
    <div class="ui fluid card">
      <div class="image entradas">
        <div class="ui statistics centrar">
          <div class="statistic">
            <div class="value">
            <?php echo json_decode($stocks)->entradas;?>
            </div>
            <div class="label">
              Unidades
            </div>
          </div>
        </div>
      </div>
      <div class="content centrar entradas-content">
        <h1 class="header">Entradas</h1>
      </div>
    </div>
  </div>
 <div class="column">
    <div class="ui fluid card">
      <div class="image salidas">
        <div class="ui statistics centrar">
          <div class="statistic">
            <div class="value">
              <?php 
              if (json_decode($stocks)->salidas ==null)
                echo '0';
              else
                echo json_decode($stocks)->salidas;
              ?>
            </div>
            <div class="label">
              Unidades
            </div>
          </div>
        </div>
      </div>
      <div class="content centrar salidas-content">
        <h1 class="header">Salidas</h1>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="ui fluid card">
      <div class="image disponibles">
        <div class="ui statistics centrar">
          <div class="statistic">
            <div class="value">
              <?php echo json_decode($stocks)->disponibles;?>
            </div>
            <div class="label">
              Unidades
            </div>
          </div>
        </div>
      </div>
     <div class="content centrar disponibles-content">
      <h1 class="header">Disponibles</h1>
       
    </div>
     <div class="extra content centrar">
       <a>
        <i class="add icon"></i>
        Agregar
      </a>
    </div>
    </div>
  </div>
</div>

<table class="ui striped celled selectable table blue">
  <thead>
    <tr>
      <th colspan="12">
        Detalles del Producto
      </th>
    </tr>
    <tr>
      <th>Cantidad</th>
      <th>Operacion</th>
    </tr>
  </thead>
  @foreach ($detalles as $detalle)
    <tbody>
      <tr>
        <td>{{ $detalle->cantidad}}</td>
        <td>{{ $detalle->operacion}}</td>
      </tr>
    </tbody>
  @endforeach
</table>

@stop

