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
     /**
     * Metodo Index   muestra el listado de documentos
     * @param  void
     * @return view documento 
     */
    public function index(){  

          $elementos=ClasesPUCModel::lists('nombreCuenta','codigo'); 
        //die(var_dump( $elementos));
    	return view('documento.create',compact(['elementos']));

    }
     /**
     * Metodo guardarDocumento  Permite guardar un documento
     * @param  void
     * @return view documento
     */
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

    public function listar(){
        $elementos= DocumentoModel::All();
       // die(var_dump($elementos));
        return view('documento.listar',compact('elementos'));
    }
  

    public function edit($id){ 
        $elemento= DocCuentaModel::all();  
        return view('documento.detalle',['elementos'=>$elemento]);
    }

    public function create(){
       
    }

	public function destroy($id){

      DocumentoModel::destroy($id);
      
      Session::flash('mensaje','Elimino');
      return Redirect::to('/listarDocumento');
    	 
    }

    public function update($id,Request $request){
    	 
    }


    public function store(Request $request){
    	 
    }
}
