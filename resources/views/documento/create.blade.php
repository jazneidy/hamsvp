@extends('layouts.principal')

@section('content')
{!!Html::script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
<div>
<label>Tipo documento</label>
<select id="tipoDocumento">
  <option value="ingresos" >Ingreso</option>
  <option value="egreso" selected="selected">Egreso</option>
</select>
</div>
<div>
  <button onclick="addLine()">Adicionar linea</button>
</div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table id="tableDoc" class="tg">
  <tr>
    <th class="tg-031e" >Cuenta</th>
    <th class="tg-yw4l" >Codigo</th>
    <th class="tg-yw4l" >Cuenta</th>
    <th class="tg-yw4l" >Debi</th>
    <th class="tg-yw4l" >Haber</th>
    <th class="tg-yw4l" >Beneficiario</th>
  </tr>
  <tbody id="bodyTable">
  <tr>
    <td class="tg-yw4l">
      <select id="element" onchange="loadCuenta(this,'','element')" >
         <option value=""></option>
        @foreach ($elementos as $i=>$var)
          <option value="{{ $var }}">{{ $i }}</option>
        @endforeach 
      </select>
    </td>
    <td  id="codeCuenta" class="tg-yw4l">
      
    </td>
    <td  id="dataCuenta" class="tg-yw4l">
      
    </td>
    <td class="tg-yw4l col1  format"  contenteditable='true'></td>
    <td class="tg-yw4l col2 format"  contenteditable='true'></td>
    <td class="tg-yw4l"  contenteditable='true'></td>
  </tr>
 
  </tbody>
  <tr>
     <td class="tg-yw4l" colspan="3">Total Suma</td>
    <td class="tg-yw4l total data1"></td>
    <td class="tg-yw4l total data2"></td>
    <td class="tg-yw4l"></td>
  </tr>
</table> 
  <button onclick="sumData()">validar documento</button>
  <button onclick="guardarData()">guardar documento</button>


<script type="text/javascript">

var lineaNum = 0;
function addLine(){

  var linea = '<tr>'+
   ' <td class="tg-yw4l">'+
      '<select id="element'+lineaNum+'" onchange="loadCuenta(this,'+lineaNum+','+"'element"+lineaNum+"'"+')" >'+
      ' <option value=""></option>'+
       ' @foreach ($elementos as $i=>$var)'+
          '<option value="{{ $var }}">{{ $i }}</option>'+
       ' @endforeach '+
      '</select>'+
    '</td>'+
    '<td  id="codeCuenta'+lineaNum+'" class="tg-yw4l">'+ 
    '</td>'+
    '<td  id="dataCuenta'+lineaNum+'" class="tg-yw4l">'+ 
    '</td>'+
    '<td class="tg-yw4l col1  format"  contenteditable="true"></td>'+
    '<td class="tg-yw4l col2 format"  contenteditable="true"></td>'+
    '<td class="tg-yw4l"  contenteditable="true"></td>'+
  '</tr>';


  $('#bodyTable').append(linea);
  lineaNum++;
}


  function loadCuenta(val,indice, id){
    value = val.value; 
    code = $('#'+id+" option:selected").html(); 
     //console.log(code);
    $('#codeCuenta'+indice).html(""+code);
    $('#dataCuenta'+indice).html(""+value);
  } 



  var getSum = function (colNumber) {
    var sum = 0;
    var selector = '.col' + colNumber; 
    $('#tableDoc').find(selector).each(function (index, element) {
      data = $(element).text();
      if (data!="") {
         sum += parseFloat($(element).text());
       }else{
        $(element).text('0');
       }
       
    });   
    return sum;        
} 
function sumData(){ 
  console.log("dddd");
    $('#tableDoc').find('.total').each(function (index, element) {
      console.log(index);
      dataR = (getSum(index + 1));
      $(this).text(dataR); 
  });

   var debi= $('#tableDoc').find('.data1').text();
   var haber=  $('#tableDoc').find('.data2').text();
   if (debi==haber) {
    alert("cuenta realizada con exito");
   } else{
    alert("revisar la cuenta");
   };


}


Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };

 


 function format(input)
{
    var num = input.value.replace(/\./g,'');
    if(!isNaN(num)){ 
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
        input.value = num;
    }
    else{ alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g,'');
    }
}

function guardarData(  ){
      
      var data = [];
    var table = $("table #bodyTable "); 
    table.find('tr').each(function (i) {

       var temp = [];
            var $tds = $(this).find('td'),
            $id = $tds.eq(1).html(),
            nombreCuenta = $tds.eq(2).text(),
            debe = $tds.eq(3).text(),
            haber = $tds.eq(4).text(),
            beneficiario = $tds.eq(5).text();

        temp.push($id);
        temp.push(nombreCuenta);
        temp.push(debe);
        temp.push(haber);
        temp.push(beneficiario);
        data.push(temp)
        // do something with productId, product, Quantity
        //console.log(temp);  
    }); 

    debe = $(".data1").html();
    haber = $(".data2").html();
    typeDoc = $('#tipoDocumento option:selected').html();
 //console.log(debe);
   
        $.ajax({
            url: '/guardarDocumento',
            type: "get",
            data: {'data' :data,'debe':debe,'haber':haber,'tipo':typeDoc},
            success: function(data){ 
              console.log(data);
            },
            error: function(data){
              console.log(data);
              alert("informacion : El elemento no se ha encontrado");
            }
          });  
  }


</script>

@stop