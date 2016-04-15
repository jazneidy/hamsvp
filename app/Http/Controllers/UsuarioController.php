<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\User;

class UsuarioController extends Controller
{
    //
    /*

    */
    public function index(){
    	$usuarios= User::All();
    	return view('usuario.read',compact('usuarios'));
    }


    public function edit($id){
    	$usuario= User::find($id);
    	return view('usuario.edit',['usuario'=>$usuario]);
    }

    public function create(){
    	return view('usuario.create');
    }



	public function destroy($id){

    	User::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/usuario');
    }
    public function update($id,Request $request){
    	$usuario= User::find($id);
    	$usuario->fill($request->all());
    	$usuario->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/usuario');
    }


    public function store(Request $request){
    	User::create([
    		'name'  =>$request['name'],
    		'email'=>$request['email'],
    		'password'=>bcrypt($request['password'])
    	]);

    	return redirect('/usuario')->with('mensaje','ingreso');
    }

     public function invoice() {
        $data = User::All();;
        $date = date('Y-m-d');
        $titulo = "Listado de usuarios";
        $view =  \View::make('usuario.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
        //return $pdf->stream('invoice');
        //descarga el pdf
        return $pdf->download('usuarios.pdf');
    }
}
