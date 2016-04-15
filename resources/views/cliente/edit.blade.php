@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/cliente')!!}" class="section">Clientes</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar Clientes</div>
  </div>
	<h3 class="ui header">Actualizar Cliente</h3>

{!! Form::model($cliente,['route'=>['cliente.update',$cliente->id],'method'=>'PUT'])!!}
        	@include('cliente.forms.cliente')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop