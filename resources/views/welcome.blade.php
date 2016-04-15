<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  {!!Html::style('https://fonts.googleapis.com/icon?family=Material+Icons')!!}
  <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
  <!-- ***************************Files Css*********************************** -->

 
  {!!Html::style('css/main.css')!!}
  <!-- <link href="css/main.css" rel="stylesheet"> -->

 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>-->
  {!!Html::style('css/semantic.min.css')!!}
  <!-- <link href="css/semantic.min.css" rel="stylesheet"> -->
  <title>Login</title>
 <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>

 
  

</head>

<body class="fondoLogin">
   

   <div class="ui middle aligned center aligned grid">
  <div class="column fondoBlanco">
    <h2 class="ui green image header">
      <i class="lock icon"></i>
      <div class="content">
        Login
      </div>
    </h2>
    @include('alerts.errors')
    {!! Form::open(['route'=>'login.store','method'=>'POST','class'=>'ui large form']) !!}
     
      
     
    <!-- <form class="ui large form"> -->
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            {!! Form::text('email',null,['placeholder'=>'Correo Electronico','id'=>'correo']) !!}
            <!-- <input type="text" name="email" placeholder="E-mail address"> -->

          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            {!! Form::password('password',['placeholder'=>'****','id'=>'clave']) !!}
            <!-- <input type="password" name="password" placeholder="Password"> -->
          </div>
        </div>
        {!! Form::submit('Aceptar',['class'=>'ui fluid large green submit button']) !!}
        <!-- <div class="ui fluid large blue submit button">Login</div> -->
      </div>

      <div class="ui error message"></div>

    <!-- </form> -->

    {!! Form::close() !!}

@if(Session::has('mensaje'))
  <div class="ui green floating icon message">
       <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Ok!.  
        </div>
        <div>&nbsp; {{Session::get('mensaje')}}</div>
      </div>
@endif
  
  </div>
</div>


                

            <!-- ***************************Files Javascript*********************************** -->
  {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <!--<scrip
  t type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>-->
  {!!Html::script('js/semantic.min.js')!!}
  <!--<script src="js/semantic.min.js"></script>-->
  {!!Html::script('js/main.js')!!}
  <!--<script src="js/main.js"></script>-->
   <script>
  $(document)
    .ready(function() {
      $('.ui.form')
        .form({
          fields: {
            email: {
              identifier  : 'email',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Por favor ingrese un correo electronico'
                },
                {
                  type   : 'email',
                  prompt : 'Por favor ingrese un correo electronico valido'
                }
              ]
            },
            password: {
              identifier  : 'password',
              rules: [
                {
                  type   : 'empty',
                  prompt : 'Por favor ingrese una contraseña'
                },
                {
                  type   : 'length[6]',
                  prompt : 'Tu contraseña debe ser mayor a 6 caracteres'
                }
              ]
            }
          }
        })
      ;
    })
  ;
  </script>
</body>
</html>
