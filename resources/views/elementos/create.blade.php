@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/elementos')!!}" class="section">Elementos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear Elemento</div>
  </div>

	<h3 class="ui header">Crear elemento</h3>
{!! Form::open(['route'=>'elementos.store','method'=>'POST']) !!}
    	@include('elementos.forms.elementos')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop