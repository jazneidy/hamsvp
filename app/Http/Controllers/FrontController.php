<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;

class FrontController extends Controller
{
    public function index(){
    	return view('welcome');
    }

    public function inicio(){
    	return view('index');
    }
}
