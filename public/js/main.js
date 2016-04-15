
var id="";
$(document).ready(function(){
      $('.obligatorio.corner.label').popup({
        popup : $('.custom.popup'),
        on    : 'click'
      });


    

    $('.addCliente').click(function(){
     	$('.addCliente').addClass('loading');
      });

    $('.eli').click(function(e){
    	var clasemodal='.ui.modal.modal'+this.classList[1];
     	$(clasemodal).modal('show');
    });

    // $('.recuperar').click(function(e){
    
    //   $('.ui.modal').modal('show');
    // });

    $('.message .close')
      .on('click', function() {
        $(this).closest('.message').transition('fade');
      });

    $('#icon-movil').click(function(){
     	$('#menu-left').css('transform','translate3d(0%,0,0)');
      });


    $('.ui.dropdown')
      .dropdown({
       direction: 'downward'
      })
    ;

    $('.ui.accordion').accordion();

    $('a.item').click(function(e){
      //obtiene el id del item y lo guarda en el local storage
        localStorage.setItem("idItem",this.id);
    });

     $('#tableDataTable').DataTable(
         {
            "language": {
                "sProcessing":    "Procesando...",
                "sLengthMenu":    "Mostrar _MENU_ registros",
                "sZeroRecords":   "No se encontraron resultados",
                "sEmptyTable":    "Ningún dato disponible en esta tabla",
                "sInfo":          "Registro del _START_ al _END_ de _TOTAL_",
                "sInfoEmpty":     "No hay registros",
                "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":   "",
                "sSearch":        "Buscar:",
                "sUrl":           "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":    "Último",
                    "sNext":    "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }
      );

  $('.dataTables_filter label input, .dataTables_length label > select').css({
      "border-radius": ".28571429rem",
      "box-shadow": "0 0 0 0 transparent inset",
      "border": "1px solid rgba(34,36,38,.15)"
    });

  $('.dataTables_length').css('margin-bottom','10px');




$('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Movimientos Productos'
        },
        xAxis: {
            categories: ['Agua', 'Vino', 'Ron']
        },
        yAxis: {
            title: {
                text: 'Unidades'
            }
        },
        series: [{
            name: 'Salidas',
            data: [1, 3, 4]
        }, {
            name: 'Entradas',
            data: [5, 7, 6]
        }]
    });



      
});
window.onload = function(e){ 
  //busca el elemento con el query selector y remueve la clase "active"
  if (document.querySelector("a.item.active")!=null) {
    var ele=document.querySelector("a.item.active").classList.remove("active");
    //obtiene el elemento con con el nombre  que esta almacenado en el local storage
    //y le agrega la clase "ative"
    document.getElementById(localStorage.getItem("idItem")).classList.add("active");
    localStorage.removeItem("idItem");
  }else{
    document.getElementById(localStorage.getItem("idItem")).classList.add("active");
    localStorage.removeItem("idItem");
  }
}

