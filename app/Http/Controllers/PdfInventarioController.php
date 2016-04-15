<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;
use Deposito\EntradaInventarioModel;

class PdfInventarioController extends Controller
{
     public function invoice() {
        $data = EntradaInventarioModel::Productos();
        $date = date('Y-m-d');
        $titulo = "Listado de Inventario";
        $view =  \View::make('inventario.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
        // return $pdf->stream('invoice');
        //descarga el pdf
        return $pdf->download('Inventario.pdf');
    }

    public function getData(){
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
