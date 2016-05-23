<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ActivosFijosModel;
use Deposito\ElementoModel;
use Deposito\ClasesPucModel;

use Deposito\InventarioModel;

//@author jazneidy Vargas Silva.

class ActivosFijosController extends Controller
{
  /**
     * Metodo Index   muestra el listado de los  registros de activos Fijos
     * @param  void
     * @return view ActivosFijos
     */
    public function index(){
    	$ActivosFijos= ActivosFijosModel::all();
    	return view('activosFijos.read',compact('ActivosFijos'));
    }
    /**
     * @Metodo edit  mostrara el formulario de activos fijos para modificar un  registro.
     * @param  id identificador del registro a editar
     * @return view ActivosFijos
     */

    public function edit($id){
    	//$ActivosFijos= ActivosFijosModel::find($id);
    	//return view('ActivosFijos.edit',['ActivosFijos'=>$ActivosFijos]);
      
        $elementos=ElementoModel::lists('nombre','id');
        $inventario=inventarioModel::ListadoInventario();
         $ActivosFijos= ActivosFijosModel::find($id);
         
         return view('activosFijos.edit',['ActivosFijos'=>$ActivosFijos,'inventario'=>$inventario,
            'elementos'=>$elementos]);
    }

    
/** 
 *  Metodo create mostrara el formulario para la creacion de activo fijo
 *  @param  void
 *  @var elementos con la cual se llama el modelo donde se toma el nombre y el id del elemento
 *  @return vista donde estan los formularios para crear el activo fijo.
 */
    public function create(){
        $elementos=ElementoModel::lists('nombre','id');
      
        //$inventario=inventarioModel::lists('valorUnitario','id');
        //ListadoInventario
        $inventario=inventarioModel::ListadoInventario();
        //die(var_dump( $inventario));
        $clasesPuc=ClasesPucModel::lists('nombreCuenta','id');

        return view('activosFijos.create',compact(['elementos','inventario','clasesPuc']));
    }


     public function  infoDataElemento(Request $request){
         if ($request->isMethod('get')){   
            $data = $request->all();
            $id= $data['elemento_id'];
            $inventario=inventarioModel::ListadoInventario();
            $response= $inventario;
             
            foreach ($inventario as $element) {
              if ($element->elementRef==$id) {
                $response = $element;
              }
            }
            
            return response()->json(['response' => $response ]); 
        }
    }

/** 
 *  Metodo destroy con el cual se elimina un registro
 *  @param  id identificacion  del registro a eliminar.
 *  @return views  vista principal
 */

	public function destroy($id){

    	ActivosFijosModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/activosFijos');
    }

 /** 
 *  Metodo update con el cual se modifica la informacion de un registro.
 *  @param  id identificacion  del registro a actualizar.
 *  @param request  variable encargada que permite el acceso a toda la información.
 *  @return views  vista principal
 */




    public function depreciacion(){
    
          $elementos=ElementoModel::lists('nombre','id');
          //$vidaUtil=ActivosFijosModel::

    }

    public function update($id,Request $request){
    	$ActivosFijos= ActivosFijosModel::find($id);
    	$ActivosFijos->fill($request->all());
    	$ActivosFijos->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/activosFijos');
    }


 /** 
 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
 *  @param equest  variable encargada que permite el acceso a toda la información.
 *  @return views  vista principal
 */

    public function store(Request $request){
   // die(var_dump($request->all()));
        
          //obtenemos el valor actual del elemento
          $data = $request->all(); 
          $idElemento =  $data['codeElement'];
          $element = InventarioModel::elementByCode($idElemento);
          //realizamos la resta del valor de depreciacion
          $valorDepreciacion = 0;
          $fechaDepreciacion =  $data['dateDepreciacion'];
          foreach ($element as $entrada) {  
            if ($entrada->valorDepreciasion == NULL ) {
              $valorDepreciacion = $entrada->valorUnitario;
            } else {
              $valorDepreciacion = $entrada->valorDepreciasion;
            }  
          }
          
          $resultado =  $valorDepreciacion - $request['depreciacion'];
 
    	   ActivosFijosModel::create([
    		
            'elemento_id'     =>$data['codeElement'],
            'anosUso'         =>$data['anosUso'],
            'vidaUtil'        =>$data['vidaUtil'],
            'depreciacion'    =>$data['depreciacion'],
            'descripcion'     =>$data['descripcion'],
            'cuenta'          =>$data['cuenta']
                       
    	    ]); //dateDepreciacion
        InventarioModel::actualizarDepreciacion($resultado,$fechaDepreciacion, $idElemento); 
          // actualizar fecha y valor depreciacion en inventario 
        $ActivosFijos = ActivosFijosModel::all();     
      return view('activosFijos.read',compact('ActivosFijos'));
     
    }
}
