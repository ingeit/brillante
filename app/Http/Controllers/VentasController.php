<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use \App\GestorProductos;
use App\Productos;
use App\Http\Requests\VentasRequest;
use App\GestorVentas;
use App\Ventas;

class VentasController extends Controller
{
    public function index()
    {   
        $seccion=Input::get('seccion');
        if ($seccion == 'index'){
            return view('ventas.index');
        }else{
            $gestor = new GestorVentas();
            $listaVenta = $gestor->listar();
            return view('ventas.lista',compact ('listaVenta'));
        }
        
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

 
    public function create(Request $request)
    {     
        // cuando doy de alta la venta con un SP, en ese mismo SP llevo el string de las lineas y hago todo de una sola vez
        // asi se hace.. para evitar problemas de q JUSTO paso algo..
        // entonces obtengo monto y fecha (para generar una nueva venta y despues generamos el STRING de las lineas contac.
        $monto = $request->total; 
        $fecha = date("d-m-Y H:i"); 
        
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
        $v = new Ventas($fecha,$monto,$cadena);
        $gv = new GestorVentas();
        $consulta = $gv->nueva($v); // lo agrego a la base de datos
        return $consulta;
    }
    
     public function agregarLinea(Request $request)
    {      
        $p=new Productos();
        $p->dame($request->consulta);
        return Response::json($p); 
    }

 
//    public function store(VentasRequest $request)
//    {
//        $gv = new GestorVentas();
//        $v = new Ventas();
//        $v->fill($request->all());// completo los atributos del objeto Ventas
//        $resultado = $gv->nueva($v); // lo agrego a la base de datos
//        foreach ($resultado as $r) { // obtengo el mensaje de la base de datos
//            $mensaje = $r->Mensaje;
//        }
//        Session::flash('mensaje',$mensaje); // mando el mensaje de la base datos a la vista
//        return redirect()->back(); // vuelvo a ventas
//    }

    public function mostrar(Request $r)
    {   
        $gv = new GestorVentas();
        $venta = $gv->dame($r->idVenta);
        return view('ventas.detalle',compact('venta'));
    }
    
    public function cobrar(Request $r)
    {
        //sirve para actualizar el estado Impago a Pago de una venta.
        $gv = new GestorVentas();
        $venta = $gv->cobrar($r->idVenta);
        return $venta;
    }    
    
    public function cobrarModal(Request $request) // Sirve para generar el modal, como vengo de AJAX, tiene que ser un REQUEST
    {
        $id=$request->consulta;
        $gv = new GestorVentas();
        $resultado = $gv->dame($id);
        return Response::json($resultado); 
    }
    
    public function show($id)
    {
        
    }

 
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {

        $gv = new GestorVentas();
        $resultado = $gv->baja($id);
        Session::put('codigo',$resultado[0]->codigo);
        Session::put('mensaje',$resultado[0]->mensaje);
        return Redirect::back()->with('resultado', 'si');
    }
}
