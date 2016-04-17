@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/dependencias')!!}" class="section">Dependencias</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear Dependencia</div>
  </div>

	<h3 class="ui header">Crear Dependencia</h3>
{!! Form::open(['route'=>'dependencias.store','method'=>'POST']) !!}
    	@include('dependencia.forms.dependencia')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop