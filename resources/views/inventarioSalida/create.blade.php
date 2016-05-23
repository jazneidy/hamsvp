@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Movimiento Negativo</div>
  </div>

	<h3 class="ui header">Movimiento Negativo</h3>
 
	 <div class="ui form">
               <div class="three fields">
					<div class="field">
					    <label>Elemento</label>
					    <select id="element" onchange="getInfoItem(this)" >
					    <option value="-1" selected>Seleccione</option>
							@foreach ($elementos as $i=>$var)
							 	<option value="{{ $i }}">{{ $var }}</option>
							@endforeach	
					    </select>
				  	</div>	
				  		
			  </div>
				  	<div class="three fields">
				  	  <div class="field">
					    <label>Grupo</label>
					    <label id="group"></label>
				  	</div>	
				  		
			  </div>
			  
			<div class="three fields">
					 <div class="field">
				      <label>Dependencia</label>
					    <label id="dependencia"></label>
				  	</div>	
			</div>	

			<div class="three fields">
				    <div class="field">
					      <label>Valor Unitario</label>
						    <div class="ui left icon corner labeled input">
						    <i class="dollar icon"></i>
						     <label id="value"></label>
						    
						    </div>
				    </div>
			  	</div>

			    <div class="three fields">
				    <div class="field">
					      <label>Cantidad Actual</label>
						    <div class="ui corner labeled input">
						      <label id="cantidad"></label>
						    </div>
				    </div>
			  	</div>

			        <div class="three fields">
				     <div class="field ">
					      <label>Catidad Salida</label>
						    <div class="ui left icon corner labeled input">
						    <i class="dollar icon"></i>
						     <input id="descuento" type="text" name="descuento" disabled>
						      
						    </div>
				    </div>
			  	</div>	
	</div>	  
	
	<div class="ui hidden divider"></div>
	
<button value="Submit" id="actionButton" onclick="getDescontarItem()" style="display:none" class="ui primary  button">Aceptar</button>

<script type="text/javascript">

	function getInfoItem(val){
	//alert(val.value);
		$.ajax({
		      url: '/getElementoById',
		      type: "get",
		      data: {'elemento': val.value},
		      success: function(data){

		      	console.log(data);
		        $('#group').html(data['response']['grupo']['nombre']);
		        if(data['response']['dependencia'] != null){
		        	$('#dependencia').html(data['response']['dependencia']['nombre']);	
		        }
		        $('#cantidad').html(data['response']['inventario']['cantidad']);
		        $('#value').html(data['response']['inventario']['valorUnitario']);
		        //
		        $('#descuento').prop('disabled', false);
		        $('#actionButton').show();
		        

				 
		      },
		      error: function(data){
		      	console.log(data);
		        alert("informacion : El elemento no se ha encontrado");
		      }
		    });   

		
	}


function getDescontarItem(  ){
		 var data1= $( "#element" ).val();  
		 var canAct =  $( "#cantidad").html();
		 var canDiconunt =  $( "#descuento").val();
		 console.log(canDiconunt);
		 if (canDiconunt!="" && $.isNumeric( canDiconunt )) {
		 		$( "#descuento" ).val("");
			 	$.ajax({
			      url: '/descontarElemento',
			      type: "get",
			      data: {'elemento_id': data1, 'canDiconunt':canDiconunt},
			      success: function(data){ 
			      console.log(data); 
			      	if (data['response']['response']['code'] =="done") {
							$( "#cantidad").html(canAct-canDiconunt);
			      			alert(data['response']['mensaje']);	
			      	} else{
			      		alert(data['response']['mensaje']);	
			      	};
			      		

			      },
			      error: function(data){
			      	console.log(data);
			        alert("informacion : El elemento no se ha encontrado");
			      }
			    }); 
		 } 
	 	else{
			alert("el valor de descuento no valido");

	 	};
		  

		
	}


</script>


@stop