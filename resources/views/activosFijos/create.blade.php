@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/ActivosFijos')!!}" class="section">Activos Fijos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Depreciacion</div>
  </div>

	<h3 class="ui header">Depreciasion ActivoFijo</h3>
{!! Form::open(['route'=>'ActivosFijos.store','method'=>'POST']) !!}
    	@include('ActivosFijos.forms.ActivosFijos')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop