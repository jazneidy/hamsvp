@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/activosFijos')!!}" class="section">Activos Fijos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Depreciacion</div>
  </div>

	<h3 class="ui header">Depreciasion ActivoFijo</h3>
{!! Form::open(['route'=>'activosFijos.store','method'=>'POST']) !!}
    	@include('ActivosFijos.forms.ActivosFijos') 
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	

  <div id="infoData">
    
  </div>


<script type="text/javascript">
  
  function getDataItem(  ){
     var data1= $( "#element" ).val();   
     console.log(data1); 
        $.ajax({
            url: '/infoDataElemento',
            type: "get",
            data: {'elemento_id': data1},
            success: function(data){ 
            console.log(data); 
               $('#infoData').html( data['response']['valorDepreciasion']  ); 

            },
            error: function(data){
              console.log(data);
              alert("informacion : El elemento no se ha encontrado");
            }
          }); 
      
      

    
  }

</script>


@stop