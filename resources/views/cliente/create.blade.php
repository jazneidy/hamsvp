@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/cliente')!!}" class="section">Clientes</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear Clientes</div>
  </div>

	<h3 class="ui header">Crear Cliente</h3>
{!! Form::open(['route'=>'cliente.store','method'=>'POST']) !!}
    	@include('cliente.forms.cliente')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop