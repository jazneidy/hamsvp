@extends('layouts.principal')



@section('content')



  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Productos</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
    Productos
  </h2>
  <div class="ui divider"></div>

   @if(Session::has('mensaje'))
      <div class="ui green floating icon message">
      <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Accion Procesada!.  
        </div>
        <div>&nbsp; El registro se {{Session::get('mensaje')}} <b>exitosamente</b>.</div>
      </div>
    @endif

 <table class="ui striped celled selectable table blue" id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado de Productos
        <a href="{!!URL::to('/producto/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button">
          <i class="cubes icon"></i>Crear Producto
        </div>
        </a>


        <div class="ui right floated blue floating labeled dropdown icon button">
          <i class="download icon"></i>
          <div >Descargar</div>
          <div class="menu">
           
      
            
            <a href="{!!URL::to('/productos/pdf')!!}" class="item">
            <div class="item">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAC3UlEQVQ4T32TTUxUVxTHf/e9N18oKFKpCThMCSauDKmYVrGijQsXbnBjSLqtcWPqsjVRQSuFkiamSWPiQqMbm9CmQUO0qGH8iJW0JECKVhz8YBQEZMJzZh7z9eb2MItmphpvcnPfO7n3d/73nP9VFI3zP/+qi////10/O93e8tWhjuK4ypw7rz2PHqPn5mDzx6SuXEG1tED4Fmrrp7h9l8nYNolknL6uHrYEPO2ftLX9B1FLnV3ad+Mm/PMIvvsWlc6g79xGtbbixhZIHDiIrTVTOs8fP/7E4YNfMnp/KLxlx/Zdy0qU8/UR7R+4Dtkc6tQJdNsX0N2Jqqgg+2Cc1909vBLABHkSFy/x4kmEysrVNDU2tje3fNahZr/v0fN/DYPjYEcmcbNp2QppFFlZl0SFbRrY5RVsPHuO2egU6XSa8vIV1Nc37FTFBen/rW+q4oN161eWl+Hz+/HKtOJv0Mog4/XiJJMkZSYSSZTEfD5D0hSN/v6rurY2SFlZAK/Hg8fvwxr4nXx1NflNjYXMjrMkEEcApqyxUsDAwA1dF/qocDgQ8EsGL7nTp1FNTRjN28lksgJwRMEywGBhYaYUMDh4S9fVhbAsUwBlWH4BXL1GXmmsz3ejpZjLCgpXMD3MzjwvBdy9e0+HBGCaJl6fBxWLkQ8PYkpMB+vQNTUFQHzRxpIrTE8/KwUMDf2pg7JRKYUV8KF7ezH2tZIfDONeuADj4+T27sWVQjrfHJOOTJYChodHpIi14g6F8WqG3JkzeI4fRa1aRS6ZImtIW59HMU6eINn9A7GXT0sBY2Pjuqa2hswvvajKNbBnD9nFRbRss8XOfp+fmPhCW15MMctbXXj4cEKvb6gn2SFW378ft2otoyMjzM3PE41Gpb0reL0wT/O2HcQTcdZ9uKZUQSTyVIdCQdLie8eO47ouTyYjjI39TSqVQqQUjGRaFlVV1WzYECwFhMPh9z7ndz31fwHzKUZqBcwMqwAAAABJRU5ErkJggg==">
              <!-- <i class="file excel outline icon"></i> -->
              Pdf
            </div>
            </a>
            <a href="{!!URL::to('/clientes/pdf')!!}" class="item">
            <div class="item">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACrklEQVQ4T3WT30taYRjHv68dyxm6NFSKVuky+w3zwjIIImo3mziIikIJuoyuhcbKi7rpdl2MQesPKKjudhfbLrqzFhIJ6nEuqWV0/LGmWXnenXOaTSd74OXhfc/7fM73+fES/LGZmRmaSqXAVDCFI8nn83lpFUylVl3ZbLYXc3NzX8QzUgxYW1sTt7SE8M9m/cM6bvO3V5SnjtnZ2c+k53WPFzKAT/L2rsau5xaL5SFk0DKIVlUrUukUCCGo1dZie2sb9n47drZ3rpTVypek7U0b7+pzlf10N7BLBswD1Ovwlnzb3NwkDMOA53lsbGzwxPHWwadzaVBKseRcwvzWPCpkFRhqGyIcx8Hd5UZNTQ2SyaTkE4kENBoNctc5uri4SCTApG0SKx9XcBg7hEwmw/KrZeTuckS4TN2dbimgEMglOGg1WmQyGXi93nvA6tQqxt+PI3uTRTAeRP/TfqgfqUl3fTcVFRibjYh8i0ieZVmYTCYcHx//BQR+BBA8D6K9vh2MjEH0Moqp3ilSma+UUihRIKSl1QoKfmXowsLCvQKX3YW7/J1UrKPTI/hjfnEeiPGxUVKg0+lwcXEh+Xg8Dr1eD+6Su1fQ6GnkRzpGyrqw/32fDJuHJUBnRyey2SyUSiXYCAuD3iAVfXp6mhD3O7feUG0A94k7FwfJH/BTjU4o2kUCpmYTTk9OYTabEWbDkDNyJJIJsGEWTqcTY2NjwnQUjbII8O37oFapkf6Zfsjd+sxKD74eIHYSQ8OTBoRDYYyOjv4H4PNRtVoApIsAVitEQDQSRYu5BYFAQAIIq1xBMBikdXV1ODs7Q1NTE6LRKBQKBfb29nCTu0GVogrX2Wv09vXC4/GUA0KhUFlBjUYjFd9CsYmjPDExUQoQWkTlcnnpzaIoMUic1IKJnfkNjVVKIwW8T6oAAAAASUVORK5CYII=">
              <!-- <i class="file excel outline icon"></i> -->
              Excel
            </div>
            </a>
            </a>
            <a href="{!!URL::to('/clientes/pdf')!!}" class="item">
            <div class="item">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACcUlEQVQ4T4VTS0wTURQ9Uz5FS8S0gZCQIgE/CcTExMSdC3e61BRc+QNEsCVE0xpYWRESCBW/QGmaiGlVMCYYF6xc+KkLsGr9UBNpIVKC2mpLKdDfzDzfdDpFAspMXu57mbnnnnvOfQzSj8l0LQqQPOn8r1hWVq7TaI71Sd8ZadPdc8t/5OjpQp7nwXI8OJ4gPzeJilIVeELA07O5/zYqq/by095pnU7XNCDkMk8dYbIQiSK0uIzgwgqNKwiGl8FzLHI4Pwbaa1LJArDF3AeNpgZT3mne7XZrW5rPm5nBUR/Zo1ZAxnBQbMlGLMEhEIpj1jePifcumDtPppIFEKulf01nXq9XyZjuTxE2CZQoGYyNB1FenIOJyQAO75dj/MNnWLtqRQa0DaEtCezxsA3Nzbpy5vLgJ1KgyMNrlx+/IgkkY2EUKuIwag/iys0RDJnOrUsWAB/arNDr9VXMxV4nURYo8NI5h3x5Al9mvqNbewDFRUq0mWxoN9SC0Orioj6lo/P5AxGgvsNBKndsR4kqC443X7G0tIhOgwbf5gJo7bmHR3daNnTUdtciAhxvfUY6GvchGmNTFQQL43EW8z9DuD70BF1tDWsqpxjQ992LYRHgUN1w0Od965ZnceqdFepSliqaWlT5om3ZuHFV+38Gq5PYO1vf0KienIls2LNUWdLB9WpEZLAKYCK1Z5vgpgC71Fs3m2hkNPgb4FRdY8ZnyXsh/g4nEIoIGqWdoEkfHRswOHGmIT224uBII5zZCzamh2ps1L6uBXobseltFBjn5MqpUzH2ksGwO6OB0WiU2e12lcfjUdF/ZJuKAESrqy/8+AM/DphMjuCD0wAAAABJRU5ErkJggg==">
              <!-- <i class="file excel outline icon"></i> -->
              Word
            </div>
            </a>
            <!-- <div class="item">
              <i class="comment icon"></i>
              Announcement
            </div>
            <div class="item">
              <i class="conversation icon"></i>
              Discussion
            </div> -->
          </div>
        </div>

      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th>Nombre</th>
      <th>Precio Compra</th>
      <th>Precio Venta</th>
      <th>Minimo Inventario</th>
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($productos as $producto)
      <tr>
        <td>
          {!! Html::decode(link_to_route('producto.edit', '<i class="large edit icon"></i>',$producto->id, null))!!}
        </td>
        <td>{{ $producto->nombre}}</td>
        <td>$ {{ number_format($producto->preciocompra)}}</td>
        <td>$ {{ number_format($producto->precioventa)}}</td>
        <td>{{ $producto->minimoinventario}}</td>
        <td>
          @include('producto.delete')
          <a class="eli {{$producto->id}}"> <i class="large trash outline icon" ></i></a>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

