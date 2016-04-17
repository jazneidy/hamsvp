		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
			  <div class="three fields">
					<div class="field">
					    <label>Elemento</label>
					    {!! Form::select('elemento_id',$elementos) !!}
				  	</div>	
				  		
			  </div>
			  <div class="three fields">
					
				  	<div class="field">
					    <label>Grupo</label>
					    {!! Form::select('grupo_id',$grupos) !!}
				  	</div>	
				  		
			  </div>
			  <div class="three fields">
					
				  	<div class="field">
					    <label>Dependencia</label>
					    {!! Form::select('dependencia_id',$dependencias) !!}
				  	</div>			
			  </div>

			   <div class="three fields">
				    <div class="field">
					      <label>Valor Unitario</label>
						    <div class="ui left icon corner labeled input">
						    <i class="dollar icon"></i>
						     {!! Form::text('valorUnitario',null,['placeholder'=>'','id'=>'valorUnitario']) !!}
						    
						    </div>
				    </div>
			  	</div>

			    <div class="three fields">
				    <div class="field">
					      <label>Cantidad Actual</label>
						    <div class="ui corner labeled input">
						      {!! Form::text('cantidadActual',null,['placeholder'=>'','id'=>'cantidadActual'] ) !!}
						    </div>
				    </div>
			  	</div>

			        <div class="three fields">
				     <div class="field ">
					      <label>Catidad Salida</label>
						    <div class="ui left icon corner labeled input">
						    <i class="dollar icon"></i>
						     {!! Form::text('cantidadSalida',null,['placeholder'=>'','id'=>'cantidadSalida']) !!}
						      
						    </div>
				    </div>
			  	</div>

			 
		</div>
	<script type="text/javascript">
		
	</script>
	<div class="ui hidden divider"></div>
                              