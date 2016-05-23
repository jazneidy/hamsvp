<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Deposito\Http\Requests\DependenciaCreateRequest;
use Deposito\Http\Requests\DependenciaUpdateRequest;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\DependenciaModel;

class dependenciasController extends Controller
{
    /**
     * Metodo Index   muestra el listado de las dependencias 
     * @param  void
     * @return view dependencias 
     */
    public function index(){
    	$dependencias= DependenciaModel::All();
    	return view('dependencia.read',compact('dependencias'));
    }
    /**
     * @Metodo edit  mostrara el formulario para modificar un registro.
     * @param  id identificador del registro a editar
     * @return view dependencias
     */    
    public function edit($id){
    	$dependencia= DependenciaModel::find($id);
    	return view('dependencia.edit',['dependencia'=>$dependencia]);
    }
	/** Metodo create mostrara el formulario para la creacion de una dependencia 
	 *  $cliente Declaracion de variable
	 *  $request Toma todos los campos que van en la peticion que se hacen sobre ese metodo
	 *  
	 */ 
    public function create(){
    	return view('dependencia.create');
    }
	/** 
	 *  Metodo destroy con el cual se elimina un registro
	 *  @param  id identificacion  del registro a eliminar.
	 *  @return views  vista principal
	 */
	public function destroy($id){

    	DependenciaModel::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/dependencias');
    }
	 /** 
	 *  Metodo update con el cual se modifica la informacion de un registro.
	 *  @param  id identificacion  del registro a actualizar.
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */
    public function update($id,DependenciaUpdateRequest $request){
    	$dependecia= DependenciaModel::find($id);
    	$dependecia->fill($request->all());
    	$dependecia->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/dependencias');
    }
	 /** 
	 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return dependencia
	 */
    public function store(DependenciaCreateRequest $request){
    	DependenciaModel::create([
            'nombre'           =>$request['nombre'],
            'descripcion'      =>$request['descripcion']
        ]);


    	return redirect('/dependencias')->with('mensaje','ingreso');
    }
}
