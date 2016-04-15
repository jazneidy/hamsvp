		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Nº Cedula</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('cedula',null,['placeholder'=>'Nº Cedula','id'=>'cedula']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		  </div>

		  <div class="three fields">
		    <div class="field">
			      <label>Nombres</label>
				    <div class="ui corner labeled input">
				     {!! Form::text('nombres',null,['placeholder'=>'Nombres','id'=>'nombres']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>

		    <div class="field">
			      <label>Apellidos</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('apellidos',null,['placeholder'=>'Apellidos','id'=>'apellidos']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		    
		  </div>

		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Direccion</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('direccion',null,['placeholder'=>'Direccion','id'=>'direccion']) !!}
				    </div>
		    </div>
		  </div>
		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Telefono</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('telefono',null,['placeholder'=>'3121234589-7450088','id'=>'telefono']) !!}
				    </div>
		    </div>
		  </div>

			<div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Correo</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('correo',null,['placeholder'=>'correo@dominio.com','id'=>'correo']) !!}
				    </div>
		    </div>
		  </div>
		</div>
	
	<div class="ui hidden divider"></div>
                              