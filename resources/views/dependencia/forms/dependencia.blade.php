		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Nombre</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('nombre',null,['placeholder'=>'Nombre','id'=>'nombre']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>

		  </div>

		  <div class="fields">
		    <div class="field fourteen wide padding-right-campo">
			      <label>Descripcion</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('descripcion',null,[ 'size' => '10x3','placeholder'=>'Descripcion','id'=>'descripcion']) !!}
				    </div>
		    </div>
		  </div>


		</div>
	
	<div class="ui hidden divider"></div>
                              