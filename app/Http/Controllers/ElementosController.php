<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ElementoModel;

class ElementosController extends Controller
{
    //
    /*

    */
    public function index(){
    	$elementos= ElementoModel::All();
    	return view('elementos.read',compact('elementos'));
    }

    public function edit($id){
    	$elemento= ElementoModel::find($id);
    	return view('elementos.edit',['elemento'=>$elemento]);
    }

    public function create(){
    	return view('elementos.create');
    }

	public function destroy($id){

    	ElementoModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/elementos');
    }

    public function update($id,Request $request){
    	$elemento= ElementoModel::find($id);
    	$elemento->fill($request->all());
    	$elemento->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/elementos');
    }


    public function store(Request $request){
    	ElementoModel::create([
    		'nombre'           =>$request['nombre'],
            'descripcion'      =>$request['descripcion']
    	]);

    	return redirect('/elementos')->with('mensaje','ingreso');
    }
}
