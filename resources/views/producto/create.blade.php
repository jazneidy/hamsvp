@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/producto')!!}" class="section">Productos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear Productos</div>
  </div>

	<h3 class="ui header">Crear producto</h3>
{!! Form::open(['route'=>'producto.store','method'=>'POST']) !!}
    	@include('producto.forms.producto')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop