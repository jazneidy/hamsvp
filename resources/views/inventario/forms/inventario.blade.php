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
					      <label>Cantidad</label>
						    <div class="ui corner labeled input">
						      {!! Form::text('cantidad',null,['placeholder'=>'','id'=>'cantidad'] ) !!}
						    </div>
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
				     <div class="field ">
					      <label>Valor Total</label>
						    <div class="ui left icon corner labeled input">
						    <i class="dollar icon"></i>
						     {!! Form::text('valorTotal',null,['placeholder'=>'','id'=>'valorTotal']) !!}
						      
						    </div>
				    </div>
			  	</div>

			  	<div class="ui checkbox">
			  	{!! Form::checkbox('donacion', '0', false, ['id'=>'donacion'])!!}
			      <label>Donacion</label>
			    </div>
		</div>
	<script type="text/javascript">
		
	</script>
	<div class="ui hidden divider"></div>
                              