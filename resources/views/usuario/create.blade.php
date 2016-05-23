@extends('layouts.principal')

@section ('content')

@include('alerts.errors')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/usuario')!!}" class="section">Usuarios</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear Usuarios</div>
  </div>

	<h3 class="ui header">Crear Usuario</h3>
{!! Form::open(['route'=>'usuario.store','method'=>'POST']) !!}
    	@include('usuario.forms.usuario')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	

@stop