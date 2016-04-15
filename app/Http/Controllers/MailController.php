<?php

namespace Deposito\Http\Controllers;

use Mail;
use Session;
use Redirect;
use Illuminate\Http\Request;

use Deposito\Http\Requests;

class MailController extends Controller
{
	public function store(Request $request){
		$correo=$request->email;
		// return  $correo;
		Mail::send('emails.mensaje',$request->all(),function($msj) use ($request)  {
			
			$msj->subject('Recuperacion de Contraseña');

			// $msj->to($request->email);
			 $msj->to('sebastianext@gmail.com');

		});
		Session::flash('mensaje','Solicitud Enviada.');
		return Redirect::to('/');
	}
    
    public function index(){
    	return view('recuperacion');
    }
}