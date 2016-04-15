		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
			  <div class="three fields">
					<div class="field">
					    <label>Producto</label>
					    {!! Form::select('producto_id',$productos) !!}
				  	</div>			
			  </div>

			  
			    <div class="three fields">
				    <div class="field">
					      <label>Cantidad</label>
						    <div class="ui corner labeled input">
						      {!! Form::text('cantidad',null,['placeholder'=>'10','id'=>'cantidad'] ) !!}
						    </div>
				    </div>
			  	</div>
		</div>
	
	<div class="ui hidden divider"></div>
                              