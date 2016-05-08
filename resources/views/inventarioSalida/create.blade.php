@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Movimiento Negativo</div>
  </div>

	<h3 class="ui header">Movimiento Negativo</h3>


	<select onchange="getInfoItem(this)">
		@foreach ($elementos as $i=>$var)
		 	<option value="{{ $i }}">{{ $var }}</option>
		@endforeach	
    </select>

<script type="text/javascript">

	function getInfoItem(val){
		alert(val.value);
		$.ajax({
		      url: '/getElementoById',
		      type: "get",
		      data: {'elemento': val.value},
		      success: function(data){
		        alert("lleguge "+data['response']);
isis = grupo

		      },
		      error: function(data){
		        alert("error "+data);
		      }
		    });   

		
	}



</script>


@stop