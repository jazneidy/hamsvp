@extends('layouts.principal')



@section('content') 

 <h1>listado de cuentas de l documento</h1>
<table class="ui striped celled selectable table " id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12"> 
      </th>
    </tr>
    <tr> 
      <th>Codigo</th>
       <th>Cuenta</th> 
      <th>beneficiario</th>
      
      
    </tr>
  </thead>
  
    <tbody>
    @foreach ($elementos as $elemento)
      <tr>
        <td>{{ $elemento->codigoCuenta}}</td>
        <td>{{ $elemento->nombre_cuenta}}</td> 
        <td>{{ $elemento->beneficiario}}</td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

