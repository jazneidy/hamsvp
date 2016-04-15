		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Nombre</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('name',null,['placeholder'=>'Nombre','id'=>'nombre']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		  </div>

		  <div class="three fields">
		    <div class="field">
			      <label>Correo</label>
				    <div class="ui corner labeled input">
				     {!! Form::text('email',null,['placeholder'=>'Correo','id'=>'correo']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>

		    
		    
		  </div>

		  <div class="three fields">
		    <div class="field">
			      <label>Contraseña</label>
				    <div class="ui corner labeled input">
				      {!! Form::password('password',['placeholder'=>'Contraseña','id'=>'password']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		  </div>

		</div>
	
	<div class="ui hidden divider"></div>
                              