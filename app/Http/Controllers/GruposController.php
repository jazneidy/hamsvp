<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\GrupoModel;

class GruposController extends Controller
{
    //
    /*

    */
    public function index(){
    	$grupos= GrupoModel::All();
    	return view('grupo.read',compact('grupos'));
    }


    public function edit($id){
    	$grupo= GrupoModel::find($id);
    	return view('grupo.edit',['grupo'=>$grupo]);
    }

    public function create(){
    	return view('grupo.create');
    }



	public function destroy($id){

    	GrupoModel::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/grupos');
    }
    public function update($id,Request $request){
    	$grupo= GrupoModel::find($id);
    	$grupo->fill($request->all());
    	$grupo->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/grupos');
    }


    public function store(Request $request){
    	GrupoModel::create([
            'nombre'           =>$request['nombre'],
            'descripcion'      =>$request['descripcion']
        ]);


    	return redirect('/grupos')->with('mensaje','ingreso');
    }

     public function invoice() {
        $data = GrupoModel::All();;
        $date = date('Y-m-d');
        $titulo = "Listado de grupos";
        $view =  \View::make('grupo.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        //muestra el pdf
        //return $pdf->stream('invoice');
        //descarga el pdf
        return $pdf->download('grupos.pdf');
    }
}
