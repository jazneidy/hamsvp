<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Deposito\Http\Requests;
use Deposito\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function store(LoginRequest $request){
        
    	if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
            // $user->$request['email'];
            // Auth::login($user);
            return Redirect::to('inicio');
        }
        Session::flash('message-error','Datos son incorrectos');
        
        return Redirect::to('/');
    }

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
