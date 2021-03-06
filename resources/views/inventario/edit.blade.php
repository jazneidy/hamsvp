@extends('layouts.principal')

@section('content')
@include('alerts.errors')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/inventarios')!!}" class="section">inventarios</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar inventarios</div>
  </div>
	<h3 class="ui header">Actualizar inventario</h3>

{!! Form::model($inventario,['route'=>['inventarios.update',$inventario->id],'method'=>'PUT'])!!}
        	@include('inventario.forms.inventario')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop
