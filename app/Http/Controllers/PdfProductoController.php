<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;
use Deposito\ProductoModel;

class PdfProductoController extends Controller
{
     public function invoice() {
        $data = ProductoModel::All();
        $date = date('Y-m-d');
        $titulo = "Listado de Productos";
        $view =  \View::make('producto.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
        // return $pdf->stream('invoice');
        //descarga el pdf
        return $pdf->download('productos.pdf');
    }

    
}
