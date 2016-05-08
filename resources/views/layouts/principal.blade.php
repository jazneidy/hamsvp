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
   <title>Hogar Adulto Mayor San Vicente de Paul</title>
 

 
</head>

<body>
   
          
              <div id="menu-left" class="ui visible  left vertical  sidebar green menu ">
                


                <div class="ui fluid  vertical accordion green menu menuBlanco">
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
                  
                   <div class="ui  divider hidden no-margin no-border-top"></div>
                    <a href="{!!URL::to('/dependencias')!!}" class="item"  id="producto">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                             <i class="large cubes icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Dependencias</h4>
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
                        <a href="{!!URL::to('/inventarios/create')!!}" class="item "><h5 class="h4-font">Movimiento Positivo</h5></a>
                       <a href="{!!URL::to('/inventarioSalida/create')!!}" class="item "><h5 class="h4-font">
                       Movimiento Negativo<h5></a>
                        <a  href="{!!URL::to('/inventarioSalida/create')!!}"class="item "><h5 class="h4-font">Mostrar Inventario </h5></a>
                       
                    </div>

                  </div>
                  <div class="ui divider hidden no-margin no-border-top"></div>
                
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

                    <a href="{!!URL::to('/grupos')!!}" class="item">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large block layout icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Grupos</h4>
                           </div>
                        </div>
                     </div>
                   </a>

                  <a href="{!!URL::to('/elementos')!!}" class="item" id="elemento">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large settings icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">Elementos</h4>
                           </div>
                        </div>
                     </div>
                   </a>
                </div>
              </div>


                  <a href="{!!URL::to('/ClasesPUC')!!}" class="item" id="ClasesPUC">
                     <div class="ui grid">
                        <div class="row">
                           <div class="one wide column">
                              <i class="large settings icon"></i>
                           </div>
                           <div class="ten wide column ">
                              <h4 class="h4-font">CLases</h4>
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
