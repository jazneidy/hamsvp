@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/producto')!!}" class="section">Productos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar Productos</div>
  </div>
	<h3 class="ui header">Actualizar Producto</h3>

{!! Form::model($producto,['route'=>['producto.update',$producto->id],'method'=>'PUT'])!!}
        	@include('producto.forms.producto')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop