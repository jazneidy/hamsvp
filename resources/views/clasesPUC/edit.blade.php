@extends('layouts.principal')

@section('content')
@include('alerts.errors')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/ClasesPUC')!!}" class="section">Cuentas</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar Cuentas</div>
  </div>
	<h3 class="ui header">Actualizar Cuentas</h3>

{!! Form::model($ClasesPuc,['route'=>['ClasesPUC.update',$ClasesPuc->id],'method'=>'PUT'])!!}
        	@include('ClasesPUC.forms.ClasesPUC')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop