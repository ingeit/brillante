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

Route::get('foo', function () {

$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select Rate from yahoo.finance.xchange where pair in ("USDARS")';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json&env=store://datatables.org/alltableswithkeys&callback=";
        // Make call with cURL
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($session);
        // Convert JSON to PHP object
        $phpObj =  json_decode($json);
        return $phpObj->query->results->rate->Rate;
});

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

$router->get('/compras/{id}/{fecha}/{monto}',[
    'uses' => 'ComprasController@mostrar',
    'as'   => 'detalleCompra'
]);

/*Route::group(['middleware' => 'web'], function () {
});*/