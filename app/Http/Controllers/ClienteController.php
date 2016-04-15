<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ClienteModel;

class ClienteController extends Controller
{
    //
    /*

    */
    public function index(){
    	$clientes= ClienteModel::All();
    	return view('cliente.read',compact('clientes'));
    }


    public function edit($id){
    	$cliente= ClienteModel::find($id);
    	return view('cliente.edit',['cliente'=>$cliente]);
    }

    public function create(){
    	return view('cliente.create');
    }



	public function destroy($id){

    	ClienteModel::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/cliente');
    }
    public function update($id,Request $request){
    	$cliente= ClienteModel::find($id);
    	$cliente->fill($request->all());
    	$cliente->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/cliente');
    }


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
