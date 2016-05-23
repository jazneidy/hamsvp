@extends('layouts.principal')

@section('content')
@include('alerts.errors')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/Clase')!!}" class="section">Cuenta</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear Cuenta</div>
  </div>
	<h3 class="ui header">Crear Cuenta</h3>
{!! Form::open(['route'=>'ClasesPUC.store','method'=>'POST']) !!}
    	@include('ClasesPUC.forms.ClasesPUC')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop