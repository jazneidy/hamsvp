<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ClienteModel;

class ClienteController extends Controller
{
    /**
     * Metodo Index   muestra el listado de los  registros de clientes
     * @param  void
     * @return view clientes
     */
    public function index(){
    	$clientes= ClienteModel::All();
    	return view('cliente.read',compact('clientes'));
    }
    /**
     * @Metodo edit  mostrara el formulario de cliente para modificar un registro.
     * @param  id identificador del registro a editar
     * @return view cliente
     */
    public function edit($id){
    	$cliente= ClienteModel::find($id);
    	return view('cliente.edit',['cliente'=>$cliente]);
    }	
	/** 
     * Metodo create mostrara el formulario para la creacion de un cliente
	 * $cliente Declaracion de variable
	 * $request Toma todos los campos que van en la peticion que se hacen sobre ese metodo
	 */ 
    public function create(){
    	return view('cliente.create');
    }
	/** 
	 *  Metodo destroy con el cual se elimina un registro
	 *  @param  id identificacion  del registro a eliminar.
	 *  @return views  vista principal
	 */
	public function destroy($id){

    	ClienteModel::destroy($id);    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/cliente');
    }	
	 /** 
	 *  Metodo update con el cual se modifica la informacion de un registro.
	 *  @param  id identificacion  del registro a actualizar.
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */
    public function update($id,Request $request){
    	$cliente= ClienteModel::find($id);
    	$cliente->fill($request->all());
    	$cliente->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/cliente');
    }
	 /** 
	 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return cliente
	 */
    public function store(Request $request){
    	ClienteModel::create([
    		'cedula'  =>$request['cedula'],
    		'nombres'=>$request['nombres'],
    		'apellidos'=>$request['apellidos'],
            'direccion'  =>$request['direccion'],
            'telefono'=>$request['telefono'],
            'correo'=>$request['correo']
    	]);

    	return redirect('/cliente')->with('mensaje','ingreso');
    }

     public function invoice() {
        $data = ClienteModel::All();;
        $date = date('Y-m-d');
        $titulo = "Listado de Clientes";
        $view =  \View::make('cliente.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
        //return $pdf->stream('invoice');
        //descarga el pdf
        return $pdf->download('clientes.pdf');
    }
}
