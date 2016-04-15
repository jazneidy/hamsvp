<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;

class PdfController extends Controller
{
    public function invoice() {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
        //return $pdf->stream('invoice');
        //descarga el pdf
        return $pdf->download('invoice.pdf');
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
