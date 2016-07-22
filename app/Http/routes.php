<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('productos', 'ProductosController');
Route::resource('ventas', 'VentasController');
Route::resource('lineasVenta', 'LineasVentaController');
Route::resource('compras', 'ComprasController');
Route::resource('proveedores', 'ProveedoresController');

Route::auth();
Route::get('/home', 'HomeController@index');


//Autocompletar y filtrar con el input
Route::post('productos/filtrado', 'ProductosController@filtrado');
Route::get('search/autocomplete', 'VentasController@autocomplete');

Route::post('ventas/agregar', 'VentasController@agregarLinea');
Route::post('ventas/realizarVenta', 'VentasController@create');
Route::post('compras/agregar', 'ComprasController@agregarLinea');
Route::post('compras/realizarCompra', 'ComprasController@create');

Route::get('lineasVenta','LineasVentaController@create');

$router->get('/ventas/{id}/{fecha}/{monto}',[
    'uses' => 'VentasController@mostrar',
    'as'   => 'detalleVenta'
]);

/*Route::group(['middleware' => 'web'], function () {
});*/