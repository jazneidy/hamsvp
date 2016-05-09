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
				  		
			 
			    <div class="three fields">
				    <div class="field">
					      <label>Años Uso</label>
						    <div class="ui corner labeled input">
						      {!! Form::text('anosUso',null,['placeholder'=>'','id'=>'anosUso'] ) !!}
						    </div>
				    </div>
			  	</div>

			    <div class="three fields">
				    <div class="field">
					      <label>Vida Util</label>
						    <div class="ui left icon corner labeled input">
						  
						     {!! Form::text('vidaUtil',null,['placeholder'=>'','id'=>'vidaUtil']) !!}
						      
						    </div>
				    </div>
			  	</div>

			    <div class="three fields">
				     <div class="field ">
					      <label>Depreciasion</label>
						    <div class="ui left icon corner labeled input">
						    <i class="dollar icon"></i>
						     {!! Form::text('descripcion',null,['placeholder'=>'','id'=>'valorTotal']) !!}
						      
						    </div>
				    </div>
			  	</div>

			  	  <div class="three fields">
				     <div class="field ">
					      <label>Descripcion</label>
						    <div class="ui left icon corner labeled input">
						    <
						     {!! Form::text('descripcion',null,['placeholder'=>'','id'=>'descripcion']) !!}
						      
						    </div>
				    </div>
			  	</div

	

			  
   
 

		</div>
	<script type="text/javascript">
		
	</script>
	<div class="ui hidden divider"></div>
                              