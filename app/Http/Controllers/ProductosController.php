<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GestorProductos;
use App\Productos;
use App\GestorProveedores;
use App\Http\Requests\ProductosRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProductosController extends Controller
{  
    public function index()
    {
        $gestor = new GestorProductos();
        $listaProductos = $gestor->listar('');
        $precioDolar = $gestor->obtenerPrecioDolar();
        return view('productos.index',compact ('listaProductos','precioDolar'));
    }
    
    public function filtrado(Request $request){ //Se conecta con el js livesearch.js para filtrar la busqueda
        $cadena=$request->consulta;
        $gestor = new GestorProductos();
        $queries = $gestor->listar($cadena);
        $results = array(); 
        return Response::json($queries);
    }
  
    public function create()
    {    
        $gp = new GestorProveedores();
        $consulta = $gp->buscar('');
        $proveedor = array();
        foreach ($consulta as $c) //Convertimos los proveedores en un array Key => Value de la sig. forma
        {
            $proveedor[$c->idProveedor] = $c->razonSocial;
        }
        Session::put('titulo','Crear Producto');
        Session::put('boton','Crear Producto');
        return View('productos.form', compact('proveedor'));
    }


    public function store(ProductosRequest $request) //Con ProductosRequest verifico los campos 
    {                                                // requeridos en el form
        $gp = new GestorProductos();
        $p = new Productos();
        $p->fill($request->all());// completo los atributos del objeto Productos
        $resultado = $gp->alta($p); // lo agrego a la base de datos
        foreach ($resultado as $r) { // obtengo el mensaje de la base de datos
            $mensaje = $r->Mensaje;
        }
        return redirect()->back()->with('mensaje', $mensaje);
    }

  
    public function show($id)
    {
        
    }


    public function edit($id)
    {
        Session::flash('edicion','test');//Variable que envio a la vista para ver si se trata de un edit or create
        $data = new Productos();
        $data->dame($id); //Busco el Prodcuto por id en la base de datos
        $gp = new GestorProveedores();
        $consulta = $gp->buscar('');
        $proveedor = array();
        foreach ($consulta as $c) //Convertimos los proveedores en un array Key => Value de la sig. forma
        {
            $proveedor[$c->idProveedor] = $c->razonSocial;
        }
        Session::put('titulo','Modificar Producto');
        Session::put('boton','Modificar Producto');
        return view('productos.form',compact('data','proveedor'));
    }

  
    public function update(ProductosRequest $request, $id)
    {
        $gp = new GestorProductos();
        $p = new Productos();
        $p->fill($request->all());// completo los atributos del objeto Productos
        
        $p->idProducto=$id;
        
        $resultado = $gp->modificar($p); // lo agrego a la base de datos
        
        foreach ($resultado as $r) { // obtengo el mensaje de la base de datos
            $mensaje = $r->Mensaje;
        }
        Session::flash('mensaje',$mensaje); // mando el mensaje de la base datos a la vista
        return redirect()->back(); // vuelvo al form
    }


    public function destroy($id)
    {
        $gp = new GestorProductos();
        $resultado = $gp->baja($id);
        dd($resultado);
    }
}
