@extends('layouts.principal')

@section('content')
@include('alerts.errors')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/grupos')!!}" class="section">Grupos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear grupo</div>
  </div>

	<h3 class="ui header">Crear grupo</h3>
{!! Form::open(['route'=>'grupos.store','method'=>'POST']) !!}
    	@include('grupo.forms.grupo')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop