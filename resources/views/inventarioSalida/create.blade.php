@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Movimiento Negativo</div>
  </div>

	<h3 class="ui header">Movimiento Negativo</h3>
{!! Form::open(['route'=>'inventarioSalida.store','method'=>'POST']) !!}
    	@include('inventarioSalida.forms.inventarioSalida')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop