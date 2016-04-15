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

<body>
   

   <div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue image header">
      <i class="lock icon"></i>
      <div class="content">
        Recuperacion de Contraseña
      </div>
    </h2>
     
    
    {!! Form::open(['url'=>'/password/email','class'=>'ui large form']) !!}
      <div class="ui stacked segment">
      <p> Ingresa tu dirección de correo para restaurarla, Es posible que tengas que verificar tu carpeta de spam </p>
        <div class="field">
          <div class="ui left fluid  icon input">
            <i class="mail icon"></i>
            {!! Form::text('email',null,['placeholder'=>'Correo Electronico','id'=>'correo']) !!}
          </div>
        </div>
         <div class="ui hidden divider"></div>
        {!! Form::submit('Aceptar',['class'=>'ui fluid large blue submit button']) !!}
      </div>
      <div class="ui error message"></div>

    {!! Form::close() !!}
    
  </div>
</div>

@if(Session::has('status'))
  <div class="ui green floating icon message">
       <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Ok!.  
        </div>
        <div>&nbsp; {{Session::get('status')}}</div>
      </div>
@endif




                

            <!-- ***************************Files Javascript*********************************** -->
  {!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>-->
  {!!Html::script('js/semantic.min.js')!!}
  {!!Html::script('https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js')!!}
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
