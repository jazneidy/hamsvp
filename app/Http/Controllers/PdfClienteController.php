?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;
use Deposito\ClienteModel;

class PdfClienteController extends Controller
{
     public function invoice() {
        $data = ClienteModel::All();;
        $date = date('Y-m-d');
        $titulo = "Listado de Clientes";
        $view =  \View::make('cliente.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
         return $pdf->stream('invoice');
        //descarga el pdf
        //return $pdf->download('clientes.pdf');
    }

   
}
