<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/stylePdf.css" media="all" />
     <!-- {!!Html::style('css/stylePdf.css')!!} -->
    <title>pdf</title>

  </head>
  <body>

    <h1>{{$titulo}}</h1>
    <header class="clearfix">
      
      
      <div id="project">
        <div><span>PROJECT</span> Website development</div>
        <div><span>CLIENT</span> John Doe</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
        <div><span>DATE</span> {{ $date }}</div>
        <div><span>DUE DATE</span> September 17, 2015</div>
      </div>
      <div id="company" class="clearfix">
        <div>Deposito la Quinta</div>
        <div>Direccion<br /> Armenia, Quindio</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Cantidad</th>
            <th class="desc">Nombre</th>
        
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $da)
          <tr>
            <td>{{ $da->cantidad}}</td>
            <td>{{ $da->nombre}}</td>
            <td>
          </tr>
           @endforeach
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
 



  </body>
</html>