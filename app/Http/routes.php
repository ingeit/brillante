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
    return redirect()->action('HomeController@index');
}); 

Route::auth();
Route::get('/home', 'HomeController@index'); 

// ** RESOURCES ** 
Route::resource('productos', 'ProductosController');
Route::resource('ventas', 'VentasController');
Route::resource('lineasVenta', 'LineasVentaController');
Route::resource('compras', 'ComprasController');
Route::resource('proveedores', 'ProveedoresController');
Route::resource('ingresos', 'IngresosController');

//Autocompletar y filtrar con el input
Route::post('productos/filtrado', 'ProductosController@filtrado');

// ** VENTAS ** 
Route::post('ventas/realizarVenta', 'VentasController@create');
Route::get('search/autocomplete', 'VentasController@autocomplete');
Route::post('ventas/cobrar', 'VentasController@cobrar');
Route::post('ventas/cobrarModal', 'VentasController@cobrarModal');
Route::get('lineasVenta','LineasVentaController@create');
$router->get('/ventas/cobrar/{id}',[
    'uses' => 'VentasController@cobrar',
    'as'   => 'cobrarVenta'
]);
$router->post('/ventas/detalles/',[
    'uses' => 'VentasController@mostrar',
    'as'   => 'detalleVenta'
]); 

// ** COMPRAS ** 
Route::get('searchCompras/autocomplete', 'ComprasController@autocomplete');
Route::post('compras/realizarCompra', 'ComprasController@create');
Route::post('compras/agregar', 'ComprasController@agregarLinea');
Route::post('compras/realizarCompra', 'ComprasController@create');
Route::post('compras/eliminarCompra', 'ComprasController@destroy');
$router->get('/compras/{id}/{fecha}/{monto}',[
    'uses' => 'ComprasController@mostrar',
    'as'   => 'detalleCompra'
]);

// ** INGRESOS ** 
Route::get('searchIngresos/autocomplete', 'IngresosController@autocomplete');
Route::post('ingresos/agregar', 'IngresosController@agregarLinea');
Route::post('ingresos/realizarIngreso', 'IngresosController@create');
Route::post('ingresos/eliminarIngreso', 'IngresosController@destroy');
$router->get('/ingresos/{id}/{fecha}',[
    'uses' => 'IngresosController@mostrar',
    'as'   => 'detalleIngreso'
]);

Route::get('/dolar', function(){
    return view('dolar');
}); 

//Route::group(['middleware' => 'auth','administrador'], function () {
//    Route::get('/', function () {
//        return redirect()->view('home');
//    }); 
//});
//
//Route::group(['middleware' => 'auth','cajero'], function () {
//    Route::get('/', function () {
//        return redirect()->view('ventas.lista');
//    }); 
//});
//
//Route::group(['middleware' => 'auth','vendedor'], function () {
//    Route::get('/', function () {
//        return redirect()->view('ventas.index');
//    }); 
//});


