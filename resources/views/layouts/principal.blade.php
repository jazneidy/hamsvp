<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {!!Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')!!}
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <!-- ***************************Files Css*********************************** -->

  {!!Html::style('favicon.ico')!!}
  {{-- <link rel="shortcut icon" href="favicon.ico"> --}}
  {!!Html::style('css/main.css')!!}
  <!-- <link href="css/main.css" rel="stylesheet"> -->
  {!!Html::style('https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css')!!}
 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>-->
  {!!Html::style('css/semantic.min.css')!!}
  <!-- <link href="css/semantic.min.css" rel="stylesheet"> -->
   <title>Deposito de la Quinta</title>
 

 
</head>

<body>
   
          
              <div id="menu-left" class="ui visible inverted left vertical sidebar menu ">
                
                <div class="ui fluid inverted vertical accordion menu">
                <a href="{!!URL::to('/inicio')!!}" class="item" id="inicio">
                   <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large home icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Inicio</h4>
                           </div>
                        </div>
                     </div>
                   </a>
                  <a href="{!!URL::to('/cliente')!!}" class="item" id="cliente">
                   <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large users icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Clientes</h4>
                           </div>
                        </div>
                     </div>
                   </a>
                   <div class="ui  divider hidden no-margin no-border-top"></div>
                    <a href="{!!URL::to('/producto')!!}" class="item"  id="producto">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                             <i class="large cubes icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Productos</h4>
                           </div>
                        </div>
                     </div>
                   </a>
                   <div class="ui  divider hidden no-margin no-border-top"></div>
                   <div class="item">
                    <a class="title">
                      <i class="dropdown icon margin-acordion"></i>
                      <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                                <i class="large browser icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Inventario</h4>
                           </div>
                        </div>
                     </div>
                    </a>
                    <div class="content">
                        <a href="{!!URL::to('/inventario/create')!!}" class="item "><h5 class="h4-font">Registro de Entrada</h5></a>
                        <a  href="{!!URL::to('/inventario')!!}"class="item "><h5 class="h4-font">Ver Inventario</h5></a>
                        <a class="item "><h5 class="h4-font">Subsection 1</h5></a>
                    </div>
                  </div>
                  <div class="ui divider hidden no-margin no-border-top"></div>
                   <div class="item">
                    <a class="title">
                      <i class="dropdown icon margin-acordion"></i>
                      <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                                <i class="large add to cart icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Ventas</h4>
                           </div>
                        </div>
                     </div>
                    </a>
                    <div class="content">
                        <a class="item "><h5 class="h4-font">Realizar Venta</h5></a>
                        <a class="item "><h5 class="h4-font">Listado de Ventas</h5></a>
                        <a class="item "><h5 class="h4-font">Subsection 1</h5></a>
                    </div>
                  </div>
                   <div class="ui divider hidden no-margin no-border-top"></div>
                    
                  <a class="item" href="{!!URL::to('/usuario')!!}">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large user icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Usuarios</h4>
                           </div>
                        </div>
                     </div>
                   </a>

                    <a class="item">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large payment icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Creditos</h4>
                           </div>
                        </div>
                     </div>
                   </a>

                  <a href="{!!URL::to('/elementos')!!}" class="item" id="elemento">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large bar chart icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Elementos</h4>
                           </div>
                        </div>
                     </div>
                   </a>
                
                   







                </div>
              </div>






             
              <div class="pusher">
                <div class="ui inverted menu barra">
                <div class="row">
                   <div class="column">
                      <i id="icon-movil" class="blue big sidebar icon movil"></i>
                    </div>
                  
                </div>
                    
                </div>

                <div class="ui basic segment" id="main-panel" style="width:78%">
                 
                 @yield('content')

                </div>
              </div>
            

            <!-- ***************************Files Javascript*********************************** -->
  {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>-->
  {!!Html::script('js/semantic.min.js')!!}
  {!!Html::script('https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js')!!}
  <!--<script src="js/semantic.min.js"></script>-->
  {!!Html::script('js/main.js')!!}
  {!!Html::script('http://code.highcharts.com/highcharts.js')!!}
  <!--<script src="js/main.js"></script>-->
</body>
</html>
