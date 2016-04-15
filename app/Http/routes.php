<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//Route::resource('cliente','FrontController@cliente');
//Route::resource('credito','FrontController@credito');

// Route::resource('cliente','ClienteController');
/*
Route::resource('cliente','ClienteController');

Route::get('prueba', function () {
    return "hola sebastian";
});

Route::get('/', function () {
    return view('welcome');
});
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
	
    Route::auth();
	Route::get('/','FrontController@index');
	Route::get('/inicio','FrontController@inicio');
	Route::resource('/login','LoginController');
	
	Route::resource('elementos','ElementosController');

	// Route::resource('/mail','MailController');
	// Route::resource('/recuperacion','MailController@index');
 //    Route::resource('cliente','ClienteController');
	// Route::resource('usuario','UsuarioController');
	// Route::resource('producto','ProductoController');
	// Route::resource('inventario','InventarioController');
	// Route::resource('venta','VentaController');
	// Route::get('clientes/pdf','PdfClienteController@invoice');
	// Route::get('productos/pdf','PdfProductoController@invoice');
	// Route::get('inventarios/pdf','PdfInventarioController@invoice');

	// Route::get('pdf', 'PdfController@invoice');


	// Route::get('password/email','Auth\PasswordController@getEmail');
	// Route::post('password/email','Auth\PasswordController@postEmail');

	// Route::get('password/reset/{token}','Auth\PasswordController@getReset');
	// Route::post('password/reset','Auth\PasswordController@postReset');
	// // Route::resource('inventario/detalle','InventarioController@detalle');
});
