@extends('layouts.principal')

@section('content')
@include('alerts.errors')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/usuario')!!}" class="section">Usuarios</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar Usuarios</div>
  </div>
	<h3 class="ui header">Actualizar Usuario</h3>

{!! Form::model($usuario,['route'=>['usuario.update',$usuario->id],'method'=>'PUT'])!!}
        	@include('usuario.forms.usuario')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop