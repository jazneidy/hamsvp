@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/dependencias')!!}" class="section">dependencias</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar dependencias</div>
  </div>
	<h3 class="ui header">Actualizar dependencia</h3>

{!! Form::model($dependencia,['route'=>['dependencias.update',$dependencia->id],'method'=>'PUT'])!!}
        	@include('dependencia.forms.dependencia')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop