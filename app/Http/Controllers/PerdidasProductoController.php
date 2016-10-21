<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use \App\GestorProductos;
use App\Productos;
use App\Http\Requests\VentasRequest;
use App\GestorVentas;
use App\Ventas;
use Illuminate\Support\Facades\Validator;

class PerdidasProductoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('productos.perdida');
    }
    
        
    public function autocomplete()
    { //Se conecta con autocomplete.js para autocompletar los inputs de busqueda con 
      // el listado de prodcutos
        
        // la consulta es del estilo GET /search/autocomplete?term=la
        // el search/autocomplete es la direccion source del js autocomplete
        // y el termino term es el que se crea para ralizar la busqueda,
        // yo busco el valor de term
	$term = Input::get('term'); 	
        $gp = new GestorProductos();
        $consulta = $gp->listar($term);        
        return Response::json($consulta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {     
        
        // cuando doy de alta la venta con un SP, en ese mismo SP llevo el string de las lineas y hago todo de una sola vez
        // asi se hace.. para evitar problemas de q JUSTO paso algo..
        // entonces obtengo monto y fecha (para generar una nueva venta y despues generamos el STRING de las lineas contac.
        
        $result = $request->productosPOSTajax; //obtengo el envio de datos tipo 
        //POST que envie de ajax con el nombre  productosPOSTajax
        //como se envie, contiene varios varios arrays de arrays (matriz)
        // recorro con un foreach cada fil y obtengo las columnas con el 
        // nombre de cada una.
        $cadena = null;

        
        foreach ($result as $p){
            //hago este if solo para el formato,para que terminen sin || ( 1|2*2|2 )
            if ($cadena == null) {
                $cadena = $cadena.$p['id']."|".$p['cantidad']."|".$p['lugar'];
            }
            else{
                $cadena = $cadena."*".$p['id']."|".$p['cantidad']."|".$p['lugar'];
            }  
        }
        
        //concat tiene las lineas de venta primero ID despues cantidad
        // resultado de una concatenacion primero id producto $$ cantidad producto
        // || siguiente producto.
        
        //Ahora q tenemos el monto fecha (para venta), tenemos el contac de las lineas
        //Generamos la venta y a su vez las lineas ventas en un solo SP
        $params = array($cadena,'p','@codigo','@mensaje');
    	$resultado=DB::select('call perdida_producto_nuevo(?,?,?,?)',$params);
        return $resultado;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
