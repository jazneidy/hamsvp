@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Registro de Entrada</div>
  </div>

	<h3 class="ui header">Realizar Entrada de Inventario</h3>
{!! Form::open(['route'=>'inventario.store','method'=>'POST']) !!}
    	@include('inventario.forms.inventario')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop