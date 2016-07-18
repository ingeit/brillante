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
        return view('ventas.index');
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
        $monto = $request->total; 
        $fecha = date("d-m-Y H:i:s"); 
        $v = new Ventas($fecha,$monto);
        $gv = new GestorVentas();
        $resultado = $gv->nueva($v); // lo agrego a la base de datos
        
        foreach ($resultado as $r) { // obtengo el ID de la venta para ingresar las lineas a ESTA VENTA!
            $mensaje = $r->id; // en variable mensaje tengo el id venta generada..
        }
        
        $resultado = $request->productosPOSTajax; //obtengo el envio de datos tipo 
        //POST que envie de ajax con el nombre  productosPOSTajax
        //como se envie, contiene varios varios arrays de arrays (matriz)
        // recorro con un foreach cada fil y obtengo las columnas con el 
        // nombre de cada una.
        $concat = '';
        foreach ($resultado as $p){    
            $concat = $concat.$p['id']."&&".$p['cantidad']."||"; 
        }
        //concat tiene las lineas de venta primero ID despues cantidad
        // resultado de una concatenacion primero id producto $$ cantidad producto
        // || siguiente producto.
        
        //dd("id venta",$mensaje, $concat);
    }
    
     public function agregarLinea(Request $request)
    {      
        $p=new Productos();
        $p->dame($request->consulta);
        return Response::json($p); 
    }

 
    public function store(VentasRequest $request)
    {
        $gv = new GestorVentas();
        $v = new Ventas();
        $v->fill($request->all());// completo los atributos del objeto Ventas
        $resultado = $gv->nueva($v); // lo agrego a la base de datos
        foreach ($resultado as $r) { // obtengo el mensaje de la base de datos
            $mensaje = $r->Mensaje;
        }
        Session::flash('mensaje',$mensaje); // mando el mensaje de la base datos a la vista
        return redirect()->back(); // vuelvo a ventas
    }

    public function show($id)
    {
        //
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