@extends('layouts.principal')



@section('content')

  @if(Session::has('mensaje'))
      <div class="ui green floating icon message">
      <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Proceso Exitoso!.  
        </div>
        <div>&nbsp; El registro se {{Session::get('mensaje')}} <b>correctamente</b>.</div>
      </div>
    @endif

  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Usuarios</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
     <i class="circular large user icon"></i>
    Usuarios
  </h2>
  <div class="ui divider"></div>

    

 <table class="ui striped celled selectable table " id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado de Usuarios
        <a href="{!!URL::to('/usuario/create')!!}">
        <div class="ui right floated small addusuario primary labeled icon button greenBoton">
          <i class="add user icon"></i> Crear Usuario
        </div>
        </a>


      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th >Nombre</th>
      <th >Correo</th>
    
      <th class="collapsing" >Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($usuarios as $usuario)
      <tr>
        <td>
        
        <!-- {!! Html::decode(link_to_route('usuario.edit', '<i class="large edit icon"></i>',$usuario->id, null))!!} -->
         {!! Html::decode(link_to_route('usuario.edit', '<i class="large write square icon"></i>',$usuario->id, null))!!}
        </td>
        <td>{{ $usuario->name}}</td>
        <td>{{ $usuario->email}}</td>
        <td>
           <!-- {!! Html::decode(link_to_route('usuario.edit', '<i class="large trash outline icon"></i>',$usuario->id, null))!!} -->
        @include('usuario.delete')
       
        <a class="eli {{$usuario->id}}"> <i class="large trash outline icon" ></i></a>

        </td>
        
      </tr>
       @endforeach
    </tbody>
 
</table>
@stop

