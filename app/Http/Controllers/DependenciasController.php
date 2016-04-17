<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\DependenciaModel;

class dependenciasController extends Controller
{
    //
    /*

    */
    public function index(){
    	$dependencias= DependenciaModel::All();
    	return view('dependencia.read',compact('dependencias'));
    }

    
    public function edit($id){
    	$dependencia= DependenciaModel::find($id);
    	return view('dependencia.edit',['dependencia'=>$dependencia]);
    }

    public function create(){
    	return view('dependencia.create');
    }



	public function destroy($id){

    	DependenciaModel::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/dependencias');
    }
    public function update($id,Request $request){
    	$dependecia= DependenciaModel::find($id);
    	$dependecia->fill($request->all());
    	$dependecia->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/dependencias');
    }


    public function store(Request $request){
    	DependenciaModel::create([
            'nombre'           =>$request['nombre'],
            'descripcion'      =>$request['descripcion']
        ]);


    	return redirect('/dependencias')->with('mensaje','ingreso');
    }
}
