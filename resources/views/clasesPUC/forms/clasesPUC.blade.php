		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider" ></div>
		<div class="ui form" > 


		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Codigo</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('codigo',null,[ 'size' => '10x2','id'=>'codigo']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>

		  </div>

		  <div class="fields">
		    <div class="field fourteen wide padding-right-campo">
			      <label>Nombre Cuenta</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('nombreCuenta',null,[ 'size' => '10x2','id'=>'nombreCuenta']) !!}
				    </div>
		    </div>
		  </div>

    <div>
		          <label>Naturaleza</label>
                   <select   name = "naturaleza">
                   <option   value="Pasivo">Pasivo</option>
                   <option   value="Activo">Activo</option>
                   </select>

	    </div>

		 <div class="fields">
		    <div class="field fourteen wide padding-right-campo">
			      <label>Beneficiario</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('beneficiario',null,[ 'size' => '15x2','id'=>'beneficiario']) !!}
				    </div>
		    </div>
		  </div>

		   <div class="fields">
		    <div class="field fourteen wide padding-right-campo">
			      <label>Descripcion</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('descripcion',null,[ 'size' => '10x2','id'=>'descripcion']) !!}
				    </div>
		    </div>
		  </div>

    
</div>
<div class="ui hidden divider"></div>


