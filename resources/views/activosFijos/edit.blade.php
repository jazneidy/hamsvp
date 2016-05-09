@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/elemento')!!}" class="section">elementos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar elementos</div>
  </div>
	<h3 class="ui header">Actualizar elemento</h3>

{!! Form::model($elemento,['route'=>['elementos.update',$elemento->id],'method'=>'PUT'])!!}
        	@include('elementos.forms.elementos')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop