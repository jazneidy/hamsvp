@extends('layouts.principal')

@section('content')
@include('alerts.errors')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/grupos')!!}" class="section">grupos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar grupos</div>
  </div>
	<h3 class="ui header">Actualizar grupo</h3>

{!! Form::model($grupo,['route'=>['grupos.update',$grupo->id],'method'=>'PUT'])!!}
        	@include('grupo.forms.grupo')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop