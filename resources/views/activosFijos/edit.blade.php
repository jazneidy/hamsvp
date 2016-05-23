@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/activosFijos')!!}" class="section">activosFijo</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar Activo</div>
  </div>
	<h3 class="ui header">Actualizar Activo</h3>

{!! Form::model($ActivosFijos,['route'=>['activosFijos.update',$ActivosFijos->id],'method'=>'PUT'])!!}
        	@include('activosFijos.forms.activosFijos')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
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