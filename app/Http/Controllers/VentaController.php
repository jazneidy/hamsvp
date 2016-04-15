<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\VentaModel;
use Deposito\ProductoModel;

class VentaController extends Controller
{
    //
    /*
    */

    public function index(){ 
    	return view('venta.read');

    }

    public function detalle(){
             
        return view('venta.detalle');

    }

    public function edit($id){

        $entradas= VentaModel::EntradasProductos($id);
        $salidas = VentaModel::SalidaProductos($id);
    
        $a = array();
         
        foreach ($entradas as $entrada) {
           $a['entradas']=$entrada->cantidad;
        }
        foreach ($salidas as $salida) {
           $a['salidas'] = $salida->cantidad;
        }
       
        $a['disponibles'] = $a['entradas']-$a['salidas'];
        $stocks=json_encode($a);

        $detalles=VentaModel::DetallesProductos($id);
        return view('venta.detalle',['stocks'=>$stocks,'detalles'=>$detalles]);
      

    	// $productosventa= VentaModel::find($id);
        // $productos=ProductoModel::lists('nombre','id');
    	// return view('venta.edit',['productos'=>$productos,'productosventa'=>$productosventa]);
    }

    public function create(){
        $productos=ProductoModel::lists('nombre','id');
    	return view('venta.create',compact('productos'));
    }

	public function destroy($id){

    	VentaModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/venta');
    }

    public function update($id,Request $request){
    	$venta= VentaModel::find($id);
    	$venta->fill($request->all());
    	$venta->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/venta');
    }


    public function store(Request $request){
    	VentaModel::create([
    		'cantidad'         =>$request['cantidad'],
    		'operacion'        =>1,
    		'producto_id'      =>$request['producto_id']
    	]);

    	return redirect('/venta')->with('mensaje','ingreso');
    }
}
