<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	$term = Input::get('term');
	
        $gp = new GestorProductos();
        $consulta = $gp->buscar($term);
	
	foreach ($consulta as $query)
	{
	    $resultado[] = [ 'id' => $query->idProducto, 'value' => $query->nombre];
	}
        return Response::json($resultado);
    }

 
    public function create(Request $request)
    {     
        // cuando doy de alta la venta con un SP, en ese mismo SP llevo el string de las lineas y hago todo de una sola vez
        // asi se hace.. para evitar problemas de q JUSTO paso algo..
        // entonces obtengo monto y fecha (para generar una nueva venta y despues generamos el STRING de las lineas contac.
        $monto = $request->total; 
        $fecha = date("d-m-Y H:i"); 
        
        $resultado = $request->productosPOSTajax; //obtengo el envio de datos tipo 
        //POST que envie de ajax con el nombre  productosPOSTajax
        //como se envie, contiene varios varios arrays de arrays (matriz)
        // recorro con un foreach cada fil y obtengo las columnas con el 
        // nombre de cada una.
        $cadena = null;
        
        foreach ($resultado as $p){
            //hago este if solo para el formato,para que terminen sin || ( 1|2*2|2 )
            if ($cadena == null) {
                $cadena = $cadena.$p['id']."|".$p['cantidad'];
            }
            else{
                $cadena = $cadena."*".$p['id']."|".$p['cantidad'];
            }
            
        }
        //concat tiene las lineas de venta primero ID despues cantidad
        // resultado de una concatenacion primero id producto $$ cantidad producto
        // || siguiente producto.
        
        //Ahora q tenemos el monto fecha (para venta), tenemos el contac de las lineas
        //Generamos la venta y a su vez las lineas ventas en un solo SP
        $v = new Ventas($fecha,$monto,$cadena);
        $gv = new GestorVentas();
        $result = $gv->nueva($v); // lo agrego a la base de datos
        
//        foreach ($result as $r) { // mensaje de error o venta creada con exito, con todas las lineas ventas
//            $mensaje = $r->id;
//        }
//        dd($mensaje);
        
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

    public function mostrar($id,$fecha,$monto)
    {
        $gv = new GestorVentas();
        $venta = $gv->dame($id);
        return view('ventas.detalle',compact('venta','id','fecha','monto'));
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
        //
    }
}