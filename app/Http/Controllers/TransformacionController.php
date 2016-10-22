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

class TransformacionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        return view('productos.transformacion');
    }
    
    public function autocomplete()
    { //Se conecta con autocomplete.js para autocompletar los inputs de busqueda con 
      // el listado de prodcutos
        
        // la consulta es del estilo GET /search/autocomplete?term=la
        // el search/autocomplete es la direccion source del js autocomplete
        // y el termino term es el que se crea para ralizar la busqueda,
        // yo busco el valor de term
	$term = Input::get('term2'); 	
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
        
        $productosTransformacion = $request->productosTransformacion; //obtengo el envio de datos tipo 
        $productosPerdida = $request->productosPerdida;
        //POST que envie de ajax con el nombre  productosPOSTajax
        //como se envie, contiene varios varios arrays de arrays (matriz)
        // recorro con un foreach cada fil y obtengo las columnas con el 
        // nombre de cada una.
        $cadenaPerdida = null;
        $cadenaTransformacion = null;

        
        foreach ($productosPerdida as $p){
            //hago este if solo para el formato,para que terminen sin || ( 1|2*2|2 )
            if ($cadenaPerdida == null) {
                $cadenaPerdida = $cadenaPerdida.$p['id']."|".$p['cantidad']."|".$p['lugar'];
            }
            else{
                $cadenaPerdida = $cadenaPerdida."*".$p['id']."|".$p['cantidad']."|".$p['lugar'];
            }  
        }
        
        foreach ($productosTransformacion as $p){
            //hago este if solo para el formato,para que terminen sin || ( 1|2*2|2 )
            if ($cadenaTransformacion == null) {
                $cadenaTransformacion = $cadenaTransformacion.$p['id']."|".$p['cantidad'];
            }
            else{
                $cadenaTransformacion = $cadenaTransformacion."*".$p['id']."|".$p['cantidad'];
            }    
        }
        
        //concat tiene las lineas de venta primero ID despues cantidad
        // resultado de una concatenacion primero id producto $$ cantidad producto
        // || siguiente producto.
        
        //Ahora q tenemos el monto fecha (para venta), tenemos el contac de las lineas
        //Generamos la venta y a su vez las lineas ventas en un solo SP
        
        //p de perdida en tipo, tambien hay TRANSFORMACION
        $params = array($cadenaPerdida,$cadenaTransformacion);
    	$resultado=DB::select('call transformacion_producto_nueva(?,?)',$params);
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
