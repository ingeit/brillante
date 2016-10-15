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

Route::get('/dolar', function () {
    if (Auth::user()->role == 'admin'){
        $gestor = new App\GestorDolar();
        $precio = $gestor->obtenerPrecioDolar();
        return view('dolar',compact('precio')); 
    }else{
        return "NO TIENE PERMISOS PARA ACTUALIZAR DOLAR";
    }

}); 

Route::auth();
Route::get('/home', 'HomeController@index'); 

// ** RESOURCES ** 
Route::resource('productos', 'ProductosController');
Route::resource('ventas', 'VentasController');

Route::resource('compras', 'ComprasController');
Route::resource('proveedores', 'ProveedoresController');
Route::resource('ingresos', 'IngresosController');
Route::resource('pdf', 'PdfController');

// ** PRODUCTOS ** Autocompletar y filtrar con el input
Route::post('productos/filtrado', 'ProductosController@filtrado');
Route::post('productos/eliminarProducto', 'ProductosController@destroy');

// ** PROVEEDORES **
Route::post('proveedores/eliminarProveedor', 'ProveedoresController@destroy');

// ** VENTAS ** 
Route::post('ventas/realizarVenta', 'VentasController@create');
Route::get('search/autocomplete', 'VentasController@autocomplete');
Route::post('ventas/cobrar', 'VentasController@cobrar');
Route::post('ventas/cobrarModal', 'VentasController@cobrarModal');

Route::post('ventas/eliminarVenta', 'VentasController@destroy');
$router->get('/ventasLista',[
    'uses' => 'VentasController@listaVentas',
    'as'   => 'listaVentas'
]);

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
$router->post('/compras/detalles/',[
    'uses' => 'ComprasController@mostrar',
    'as'   => 'detalleCompra'
]);
$router->get('/comprasLista',[
    'uses' => 'ComprasController@listaCompras',
    'as'   => 'listaCompras'
]);

// ** INGRESOS ** 
Route::get('searchIngresos/autocomplete', 'IngresosController@autocomplete');
Route::post('ingresos/agregar', 'IngresosController@agregarLinea');
Route::post('ingresos/realizarIngreso', 'IngresosController@create');
Route::post('ingresos/eliminarIngreso', 'IngresosController@destroy');
$router->post('/ingresos/detalles/',[
    'uses' => 'IngresosController@mostrar',
    'as'   => 'detalleIngreso'
]); 
$router->get('/ingresosLista',[
    'uses' => 'IngresosController@listaIngresos',
    'as'   => 'listaIngresos'
]);

Route::post('dolar', 'HomeController@actualizarPrecio');

// ** PDF **
$router->post('/pdfVenta/',[
    'uses' => 'PdfController@crearVenta',
    'as'   => 'crearVenta'
]); 

$router->post('/pdfIngreso/',[
    'uses' => 'PdfController@crearIngreso',
    'as'   => 'crearIngreso'
]); 

//Route::group(['middleware' => 'auth','admin'], function () {
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


