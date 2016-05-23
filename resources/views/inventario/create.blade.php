@extends('layouts.principal')

@section('content')
@include('alerts.errors')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Ingresar Elementos</div>
  </div>

	<h3 class="ui header">Realizar Entrada de Inventario</h3>
{!! Form::open(['route'=>'inventarios.store','method'=>'POST']) !!}
    	@include('inventario.forms.inventario')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop