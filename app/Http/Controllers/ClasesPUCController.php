<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ClasesPUCModel;

class ClasesPUCController extends Controller
{
    /**
     * Metodo Index   muestra el listado de los  registros de ClasesPuc
     * @param  void
     * @return view ClasesPuc
     */
    public function index(){
    	$ClasesPuc= ClasesPUCModel::All();
    	return view('clasesPUC.read',compact('ClasesPuc'));
    }
    /**
     * @Metodo edit  mostrara el formulario de ClasesPuc para modificar un  registro.
     * @param  id identificador del registro a editar
     * @return view ClasesPuc
     */
    public function edit($id){
    	$ClasesPuc= ClasesPUCModel::find($id);
    	return view('clasesPUC.edit',['ClasesPuc'=>$ClasesPuc]);
    }    
	/** Metodo create
	 *  $clasesPuc Declaracion de variable
	 *  $request Toma todos los campos que van en la peticion que se hacen sobre ese metodo
	 *  die Matar la aplicacion y pintar en panatalla que se tiene.
	 */
    public function create(Request $request){
        $clasesPuc=$request->all();  
        //die(var_dump($clasesPuc));
    	return view('clasesPUC.create');
    }
	/** 
	 *  Metodo destroy con el cual se elimina un registro
	 *  @param  id identificacion  del registro a eliminar.
	 *  @return views  vista principal
	 */
	public function destroy($id){

    	ClasesPUCModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/ClasesPUC');
    }
	 /** 
	 *  Metodo update con el cual se modifica la informacion de un registro.
	 *  @param  id identificacion  del registro a actualizar.
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */	
    public function update($id,Request $request){
    	$ClasesPuc= ClasesPUCModel::find($id);
    	$ClasesPuc->fill($request->all());
    	$ClasesPuc->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/ClasesPUC');
    }	
	 /** 
	 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
	 *  @param equest  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */
    public function store(Request $request){
 
        if($request['naturaleza'] == 'Pasivo' ){
            $naturaleza = 1;

        }
        if($request['naturaleza'] == 'Activo'){
            $naturaleza = 0;    
        }

    	     ClasesPUCModel::create([
    		'codigo'      =>$request['codigo'],
            'nombreCuenta'=>$request['nombreCuenta'],
            'naturaleza'  =>$request['naturaleza'],
            'beneficiario'=>$request['beneficiario'],
            'descripcion' =>$request['descripcion'],
            'valor'       =>$request['valor']
    	]);

    	return redirect('/ClasesPUC')->with('mensaje','ingreso');
    }
}
