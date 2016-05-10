<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ActivosFijosModel;
use Deposito\ElementoModel;

@author jazneidy Vargas Silva.

class ActivosFijosController extends Controller
{
  /**
     * Metodo Index   muestra el listado de los  registros de activos Fijos
     * @param  void
     * @return view ActivosFijos
     */
    public function index(){
    	$ActivosFijos= ActivosFijosModel::All();
    	return view('ActivosFijos.read',compact('ActivosFijos'));
    }
    /**
     * @Metodo edit  mostrara el formulario de activos fijos para modificar un  registro.
     * @param  id identificador del registro a editar
     * @return view ActivosFijos
     */

    public function edit($id){
    	$ActivosFijos= ActivosFijosModel::find($id);
    	return view('ActivosFijos.edit',['ActivosFijos'=>$ActivosFijos]);



        $valor= ActivosFijosModel::EntradasProductos($id);
        $salidas = InventarioModel::SalidaProductos($id);
    
        $a = array();
         
        foreach ($entradas as $entrada) {
           $a['entradas']=$entrada->cantidad;
        }
        foreach ($salidas as $salida) {
           $a['salidas'] = $salida->cantidad;
        }
       
        $a['disponibles'] = $a['entradas']-$a['salidas'];
        $stocks=json_encode($a);

        $detalles=EntradaInventarioModel::DetallesProductos($id);
        return view('inventario.detalle',['stocks'=>$stocks,'detalles'=>$detalles]);
    }

    
/** 
 *  Metodo create mostrara el formulario para la creacion de activo fijo
 *  @param  void
 *  @var elementos con la cual se llama el modelo donde se toma el nombre y el id del elemento
 *  @return vista donde estan los formularios para crear el activo fijo.
 */
    public function create(){
        $elementos=ElementoModel::lists('nombre','id');
        return view('activosFijos.create',compact(['elementos']));
    }

/** 
 *  Metodo destroy con el cual se elimina un registro
 *  @param  id identificacion  del registro a eliminar.
 *  @return views  vista principal
 */

	public function destroy($id){

    	ActivosFijosModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/ActivosFijos');
    }

 /** 
 *  Metodo update con el cual se modifica la informacion de un registro.
 *  @param  id identificacion  del registro a actualizar.
 *  @param request  variable encargada que permite el acceso a toda la información.
 *  @return views  vista principal
 */

    public function update($id,Request $request){
    	$ActivosFijos= ActivosFijosModel::find($id);
    	$ActivosFijos->fill($request->all());
    	$ActivosFijos->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/ActivosFijos');
    }


 /** 
 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
 *  @param equest  variable encargada que permite el acceso a toda la información.
 *  @return views  vista principal
 */

    public function store(Request $request){
 
        
    	    ActivosFijosModel::create([
    		
            'elemento_id'      =>$request['elemento_id'],
            'anosUso'          =>$request['aniosUso'],
            'vidaUtil'         =>$request['vidaUtil'],
            'depreciacion'    =>$request['depreciacion'],
            'descripcion'       =>$request['descripcion']
                       
    	]);

    	return redirect('/ActivosFijos')->with('mensaje','ingreso');
    }
}
