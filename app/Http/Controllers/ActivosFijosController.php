<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ActivosFijosModel;

class ActivosFijosController extends Controller
{
    //
    /*

    */
    public function index(){
    	$ActivosFijos= ActivosFijosModel::All();
    	return view('ActivosFijos.read',compact('ActivosFijos'));
    }

    public function edit($id){
    	$ActivosFijos= ActivosFijosModel::find($id);
    	return view('ActivosFijos.edit',['ActivosFijos'=>$ActivosFijos]);
    }

    
/** Metodo create
 *  $clasesPuc Declaracion de variable
 *  $request Toma todos los campos que van en la peticion que se hacen sobre ese metodo
 *  die Matar la aplicacion y pintar en panatalla que se tiene.
 */
    public function create(Request $request){
        $ActivosFijos=ActivosFijosModel::lists('nombre','id');
        $ActivosFijos=$request->all();  
        //die(var_dump($clasesPuc));
    	return view('ActivosFijos.create',compact(['ActivosFijos']));
    }

	public function destroy($id){

    	ActivosFijosModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/ActivosFijos');
    }

    public function update($id,Request $request){
    	$ActivosFijos= ActivosFijosModel::find($id);
    	$ActivosFijos->fill($request->all());
    	$ActivosFijos->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/ActivosFijos');
    }


    public function store(Request $request){
 
        
    	    ActivosFijosModel::create([
    		
            'elemento_id'      =>$request['elemento_id'],
            'anosUso'          =>$request['anosUso'],
            'vidaUtil'         =>$request['vidaUtil'],
            'depreciacion'    =>$request['depreciacion'],
            'descripcion'        =>$request['descripcion']
                       
    	]);

    	return redirect('/ActivosFijos')->with('mensaje','ingreso');
    }
}
