
<div class="ui modal modal{{$elemento->id}}">
  
  <div class="header">
    Eliminacion 
  </div>
  <div class="content">
    <div class="description">
      ¿Esta completamente seguro que desea eliminar el registro?
    </div>
  </div>
  <div class="actions">
    <!-- <div class="ui positive approve button aceptarEliminar">Aceptar</div> -->

    {!! Form::open(['route'=>['elementos.destroy',$elemento->id],'method'=>'DELETE']) !!}
		<button type="submit" class="ui positive approve button eliminar" >Aceptar</button>
    {!! Form::close() !!}
    <div class="ui negative cancel button cancelarEliminar">Cancelar</div>
  </div>
</div>