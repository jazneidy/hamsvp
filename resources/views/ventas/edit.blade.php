@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/inventario')!!}" class="section">inventarios</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar inventarios</div>
  </div>
	<h3 class="ui header">Actualizar inventario</h3>

{!! Form::model($productosInventario,['route'=>['inventario.update',$productosInventario->id],'method'=>'PUT'])!!}
        	@include('inventario.forms.inventario')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop