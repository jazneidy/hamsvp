<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\InventarioModel;
use Deposito\ElementoModel;
use Deposito\GrupoModel;
use Deposito\DependenciaModel;


class InventariosController extends Controller
{
    //
    /*
    */

    public function index(){
    	$inventarios= InventarioModel::ListadoInventario();  
    	return view('inventario.read',compact('inventarios'));
    }

    public function detalle(){
        return view('inventario.detalle');
    }

    public function edit($id){

       /* $entradas= InventarioModel::EntradasProductos($id);
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
      
*/
        $elementos=ElementoModel::lists('nombre','id');
        $grupos=GrupoModel::lists('nombre','id');
        $dependencias=DependenciaModel::lists('nombre','id');

    	 $inventario= InventarioModel::find($id);
         
    	 return view('inventario.edit',['inventario'=>$inventario,
            'elementos'=>$elementos,'grupos'=>$grupos,'dependencias'=>$dependencias]);
    }

    public function create(){
        $elementos=ElementoModel::lists('nombre','id');
        $grupos=GrupoModel::lists('nombre','id');
        $dependencias=DependenciaModel::lists('nombre','id');

    	return view('inventario.create',compact(['elementos','grupos','dependencias']));
    }

	public function destroy($id){

    	InventarioModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/inventarios');
    }

    public function update($id,Request $request){
    	$inventario= InventarioModel::find($id);
    	$inventario->fill($request->all());
    	$inventario->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/inventarios');
    }


    public function store(Request $request)
    {

        if($request['donacion'] == 'Compra'){
            $donacion = 0;
        }
        if($request['donacion'] == 'Donacion'){
            $donacion = 1;    
        }
         
        if($request['donacion'] == 'Comodato'){
            $donacion = 2;    
        }

         if($request['estado'] == 'Bueno'){
            $estado = 0;
        }
        if($request['estado'] == 'Regular'){
            $estado = 1;    
        }
         
        if($request['estado'] == 'Malo'){
            $estado = 2;    
        }

        
    	InventarioModel::create([
    		'cantidad'         =>$request['cantidad'],
    		'operacion'        =>1,
    		'elemento_id'      =>$request['elemento_id'],
            'grupo_id'         =>$request['grupo_id'],
            'dependencia_id'   =>$request['dependencia_id'],
            'valorUnitario'    =>$request['valorUnitario'],
            'valorTotal'       =>$request['valorTotal'],
            'donacion'         =>$donacion,
            'estado'           =>$estado,
            'valorDepreciasion'=> $request['valorUnitario'],
            'ultimaDepreciacion'=>  date("Y-m-d H:i:s")
    	]);

    	return redirect('/inventarios')->with('mensaje','ingreso');

        
    }
}
