<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests\GrupoCreateRequest;
use Deposito\Http\Requests\GrupoUpdateRequest;
use Deposito\Http\Requests;
use Deposito\GrupoModel;

class GruposController extends Controller
{
    /**
     * Metodo Index  muestra el listado de los grupos
     * @param  void
     * @return view grupo
     */
    public function index(){
    	$grupos= GrupoModel::All();
    	return view('grupo.read',compact('grupos'));
    }
    /**
     * @Metodo edit  mostrara el formulario de grupo para modificar un registro.
     * @param  id identificador del registro a editar
     * @return view grupo
     */
    public function edit($id){
    	$grupo= GrupoModel::find($id);
    	return view('grupo.edit',['grupo'=>$grupo]);
    }
	/** Metodo create
	 *  $clasesPuc Declaracion de variable
	 *  $request Toma todos los campos que van en la peticion que se hacen sobre ese metodo
	 *  die Matar la aplicacion y pintar en panatalla que se tiene.
	 */
    public function create(){
    	return view('grupo.create');
    }
	/** 
	 *  Metodo destroy con el cual se elimina un registro
	 *  @param  id identificacion  del registro a eliminar.
	 *  @return views  vista principal
	 */
	public function destroy($id){

    	GrupoModel::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/grupos');
    }
	 /** 
	 *  Metodo update con el cual se modifica la informacion de un registro.
	 *  @param  id identificacion  del registro a actualizar.
	 *  @param request  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */	
    public function update($id,GrupoUpdateRequest $request){
    	$grupo= GrupoModel::find($id);
    	$grupo->fill($request->all());
    	$grupo->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/grupos');
    }
	 /** 
	 *  Metodo store el cual se encarga de recibir  la informacion del formulario y guardar en un nuevo registro
	 *  @param equest  variable encargada que permite el acceso a toda la información.
	 *  @return views  vista principal
	 */
    public function store(GrupoCreateRequest $request){
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
