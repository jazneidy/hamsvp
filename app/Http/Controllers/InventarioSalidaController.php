<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\InventarioSalidaModel;
use Deposito\ElementoModel;
use Deposito\InventarioModel;
use Deposito\GrupoModel;
use Deposito\DependenciaModel;


class InventarioSalidaController extends Controller
{
    //
    /*
    */

    public function index(){
    	// $inventarios= InventarioModel::all();     
    	// return view('inventario.read',compact('inventarios'));
        $elementos=ElementoModel::lists('nombre','id');
        $grupos=GrupoModel::lists('nombre','id');
        $dependencias=DependenciaModel::lists('nombre','id');

        return view('inventarioSalida.create',compact(['elementos','grupos','dependencias']));
    }

    public function detalle(){
        return view('inventario.detalle');
    }

    public function edit($id){

        $entradas= InventarioModel::EntradasProductos($id);
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
      

    	// $inventario= EntradaInventarioModel::find($id);
        // $productos=ProductoModel::lists('nombre','id');
    	// return view('inventario.edit',['productos'=>$productos,'inventario'=>$inventario]);
    }

    public function create(){
        $elementos=ElementoModel::lists('nombre','id');
        $grupos=GrupoModel::lists('nombre','id');
        $dependencias=DependenciaModel::lists('nombre','id');

    	return view('inventarioSalida.create',compact(['elementos','grupos','dependencias']));
    }

	public function destroy($id){

    	EntradaInventarioModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/inventario');
    }

    public function update($id,Request $request){
    	$inventario= EntradaInventarioModel::find($id);
    	$inventario->fill($request->all());
    	$inventario->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/inventario');
    }


    public function store(Request $request){
        if($request['donacion'] == 0){
            $donacion = 1;
        }
        if($request['donacion'] == NULL){
            $donacion = 0;    
        }
        
    	InventarioModel::create([
    		'cantidad'         =>$request['cantidad'],
            'elemento_id'      =>$request['elemento_id'],
            'grupo_id'      =>$request['grupo_id'],
            'dependencia_id'      =>$request['dependencia_id'],
            'valorUnitario'    =>$request['valorUnitario'],
            'valorTotal'        =>$request['valorTotal'],
            'donacion'          =>$donacion
    	]);

    	return redirect('/inventarios')->with('mensaje','ingreso');

        
    }


    public function getElementoById(Request $request){
        if ($request->isMethod('get')){   
            $data = $request->all();
            $inventario= InventarioModel::where('elemento_id' , '=', $data['elemento'])->first();
             $grupo=GrupoModel::where('id' , '=', $inventario['grupo_id'])->first();
             $dependencias=DependenciaModel::where('id' , '=', $inventario['dependencia_id'])->first();
             $response['inventario'] =$inventario;
             $response['grupo'] = $grupo;
             $response['dependencia'] = $dependencias;
            return response()->json(['response' => $response ]); 
        }
    }

    public function descontarElemento(Request $request){
         if ($request->isMethod('get')){   
            $data = $request->all();
            $inventario= InventarioModel::where('elemento_id' , '=', $data['elemento_id'])->first();
            $valueAct= $inventario['cantidad'];
            $valDiscount =$data['canDiconunt'];
            if ($valDiscount > $valueAct || $valDiscount == 0) {
                $response['mensaje'] = "El valor ingresado para descontar no es valido";
                $response['response']['code']  = "error";
            }else{
                $valueRes= $inventario['cantidad'] - $data['canDiconunt']; 
                $inventario->cantidad = $valueRes;
                $inventario->save();
                $response['response']['residuo'] = $valueRes;
                $response['response']['code'] = "done";
                $response['mensaje'] = "Se ha realizado el descuento de la cantidad del eleento";
            }
            
            return response()->json(['response' => $response ]); 
        }
        
    }
}
