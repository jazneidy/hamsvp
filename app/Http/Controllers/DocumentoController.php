<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Deposito\ClasesPUCModel;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\DocumentoModel;
use Deposito\DocCuentaModel;
 

class DocumentoController extends Controller
{
    //
    /*
    */

    public function index(){  

          $elementos=ClasesPUCModel::lists('nombreCuenta','codigo'); 
        //die(var_dump( $elementos));
    	return view('documento.create',compact(['elementos']));

    }

    public function guardarDocumento(Request $request){
        if ($request->isMethod('get')){   
            $data = $request->all();


            //if ($request['debe'] == $request['haber']) {
            $doc_id =   DocumentoModel::create([
                    'total'         =>$request['debe'],
                    'tipo_doc'      =>$request['tipo']
                ])->id;
            //}

            foreach ($request['data'] as $value) {
                DocCuentaModel::create([
                    'codigoCuenta' =>$value[0],
                    'nombre_cuenta' =>$value[1],
                    'debe' =>$value[2],
                    'haber' =>$value[3],
                    'beneficiario' =>$value[4],
                    'documento_id' =>$doc_id

                ]);
            }
               
             
 
             
            return response()->json(['response' => $data ]); 
        } 

    }

    public function edit($id){

         
    }

    public function create(){
       
    }

	public function destroy($id){

    	 
    }

    public function update($id,Request $request){
    	 
    }


    public function store(Request $request){
    	 
    }
}
