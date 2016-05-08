<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
 

class DocumentoController extends Controller
{
    //
    /*
    */

    public function index(){  

         


    	return view('documento.create');

    }

    public function detalle(){
             
        

    }

    public function edit($id){

         
    }

    public function create(){
       
    }

	public function destroy($id){

    	 
    }

    public function update($id,Request $request){
    	 
    }


    public function store(Request $request){
    	 
    }
}
