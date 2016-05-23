		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
			  <div class="three fields">
					<div class="field">
					    <label>Elementos</label>
					    <select id="element" name="codeElement" onchange="getDataItem(this)" > 
						   @foreach ($inventario as $inv)
						   <option value="{{ $inv->elementRef }}">{{ $inv->nombreElemento }}</option> 
							@endforeach
						</select>
					   
				  	</div>	

				<div class="three fields">
				    <div class="field">
					      <label>Codigo cuenta</label>
						    <div class="ui corner labeled input">
						      {!! Form::text('cuenta',null,['placeholder'=>'','id'=>'cuenta'] ) !!}
						    </div>
				    </div>
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
						    <div class="ui corner labeled input">
						      {!! Form::text('vidaUtil',null,['placeholder'=>'','id'=>'vidaUtil'] ) !!}
						    </div>
				    </div>
			  	</div>

			   <div class="three fields">
				    <div class="field">
					      <label>Depreciación</label>
						    <div class="ui corner labeled input">
						      {!! Form::text('depreciacion',null,['placeholder'=>'','id'=>'depreciacion'] ) !!}
						    </div>
				    </div>
			  	</div

			  	  <div class="three fields">
				     <div class="field ">
					      <label>Descripcion</label>
						    <div class="ui left icon corner labeled input">
						    
						     {!! Form::text('descripcion',null,['placeholder'=>'','id'=>'descripcion']) !!}
						      
						    </div>
				    </div>
			  	</div>

			  	 <div class="three fields">
				     <div class="field ">
					      <label>fecha depreciacion</label>
						    <div class="ui left icon corner labeled input">
						    
						     {!! Form::date('dateDepreciacion',null,['placeholder'=>'','id'=>'dateDepreciacion']) !!}
						      
						    </div>
				    </div>
			  	</div>

   		</div>
		<div class="ui hidden divider"></div>
                              