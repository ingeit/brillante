<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\GestorProductos;
use App\Productos;
use App\GestorProveedores;
use App\GestorDepositos;
use App\Http\Requests\ProductosRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use \Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{  
    public function __construct() {
        //para saber el role de un usuario.
        //$user = Auth::user()->role;
        
        $this->middleware('auth');
        //los que NO son ADMINISTRADOR, solo PUEDEN entrar a index
        $this->middleware('admin',['except'=>['index','filtrado']]);
        
        //y aqui, el ADMIN SOLO PUEDE ENTRAR a create y destroy, los demas usuarios NO, 
        //$this->middleware('admin',['only'=>['create','destroy']]);
    }
    
    public function index()
    {
        $user = Auth::user()->role;
        $gestor = new GestorProductos();
        $listaProductos = $gestor->listar('');
        return view('productos.index',compact ('listaProductos','precioDolar','user'));
    }
    
    public function filtrado(Request $request){ //Se conecta con el js livesearch.js para filtrar la busqueda
        $user = Auth::user()->role;
        
        $cadena=$request->consulta;
        $gestor = new GestorProductos(); 
        $consulta = $gestor->listar($cadena);
        //pasamos el rol del usuario al JS para que cuando modifique el DOM no muestre ELIMINAR ni EDITAR segun ROL
        $consulta['rol']=$user;

        return Response::json($consulta);
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
        $gd = new GestorDepositos();
        $consultadeposito = $gd->listar('');
        $deposito = array();
        foreach ($consultadeposito as $cd) //Convertimos los proveedores en un array Key => Value de la sig. forma
        {
            $deposito[$cd->idDeposito] = $cd->nombre;
        }
        Session::put('titulo','Crear Producto');
        Session::put('boton','Crear Producto');
        return View('productos.form', compact('proveedor','deposito'));
    }
    
    public function update(Request $request, $id)
    {
        $gp = new GestorProductos();
        $p = new Productos();
        $p->fill($request->all());// completo los atributos del objeto Productos
        $p->idProducto=$id;
        $resultado = $gp->modificar($p); // lo agrego a la base de datos
        Session::put('codigo',$resultado[0]->codigo);
        Session::put('mensaje',$resultado[0]->mensaje);
        return Redirect::back()->with('resultado', 'si');
    }

    public function store(ProductosRequest $request) //Con ProductosRequest verifico los campos 
    {                                                // requeridos en el form
        $gp = new GestorProductos();
        $p = new Productos();
        $p->fill($request->all());// completo los atributos del objeto Productos
        $resultado = $gp->alta($p); // lo agrego a la base de datos
        Session::put('codigo',$resultado[0]->codigo);
        Session::put('mensaje',$resultado[0]->mensaje);
        return Redirect::back()->with('resultado', 'si');
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
        $gd = new GestorDepositos();
        $consultadeposito = $gd->listar('');
        $deposito = array();
        foreach ($consultadeposito as $cd) //Convertimos los proveedores en un array Key => Value de la sig. forma
        {
            $deposito[$cd->idDeposito] = $cd->nombre;
        }
        Session::put('titulo','Modificar Producto');
        Session::put('boton','Modificar Producto');
        return view('productos.form',compact('data','proveedor','deposito'));
    }

  
    


    public function destroy(Request $request)
    {
        $id=$request->idProducto;
        $gp = new GestorProductos();
        $resultado = $gp->baja($id);
        return Response::json($resultado);
    }
}
