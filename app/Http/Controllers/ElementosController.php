<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ElementoModel;

class ElementosController extends Controller
{
	/**
     * Metodo Index   muestra el listado de los elementos
     * @param  void
     * @return view elementos
     */
    public function index(){
    	$elementos= ElementoModel::All();
    	return view('elementos.read',compact('elementos'));
    }
	/**
     * @Metodo edit  mostrara el elemento para modificar un registro.
     * @param  id identificador del elemento a editar
     * @return view elementos
     */  
    public function edit($id){
    	$elemento= ElementoModel::find($id);
    	return view('elementos.edit',['elemento'=>$elemento]);
    }
	/** Metodo create mostrara el formulario para la creacion de un elemento
	 *  $cliente Declaracion de variable
	 *  $request Toma todos los campos que van en la peticion que se hacen sobre ese metodo
	 */ 
    public function create(){
    	return view('elementos.create');
    }
	/** 
	 *  Metodo destroy con el cual se elimina un registro
	 *  @param  id identificacion del registro a eliminar.
	 *  @return views  vista principal
	 */
	public function destroy($id){

    	ElementoModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/elementos');
    }
	/** 
	 *  Metodo update con el cual se modifica la informacion de un registro.
	 *  @param  id identificacion  del registro a actualizar.
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */
    public function update($id,Request $request){
    	$elemento= ElementoModel::find($id);
    	$elemento->fill($request->all());
    	$elemento->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/elementos');
    }
	 /** 
	 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return elemento
	 */
    public function store(Request $request){
    	ElementoModel::create([
    		'nombre'           =>$request['nombre'],
            'descripcion'      =>$request['descripcion']
    	]);

    	return redirect('/elementos')->with('mensaje','ingreso');
    }
}
