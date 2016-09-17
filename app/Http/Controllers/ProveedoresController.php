<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GestorProveedores;
use App\Proveedores;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;


class ProveedoresController extends Controller
{
    
    public function index()
    {
        $gestor = new GestorProveedores();
        $proveedores = $gestor->buscar('');
        return view('proveedores.index',compact ('proveedores'));
    }

    public function create()
    {
        Session::put('titulo','Crear Proveedor');
        Session::put('boton','Crear Proveedor');
        return View('proveedores.form');
    }

    
    function store(Request $request)
    {
        $gp = new GestorProveedores();
        $p = new Proveedores();
        $p->fill($request->all());// completo los atributos del objeto Productos
        $resultado = $gp->alta($p); // lo agrego a la base de datos
        foreach ($resultado as $r) { // obtengo el mensaje de la base de datos
            $mensaje = $r->Mensaje;
        }
        return redirect()->back()->with('mensaje', $mensaje);
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
        Session::flash('edicion','test');//Variable que envio a la vista para ver si se trata de un edit or create
        $data = new Proveedores();
        $data->dame($id); //Busco el Prodcuto por id en la base de datos
        Session::put('titulo','Modificar Producto');
        Session::put('boton','Modificar Producto');
        return view('proveedores.form',compact('data'));
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
        $gp = new GestorProveedores();
        $p = new Proveedores();
        $p->idProveedor=$id;
        $p->fill($request->all());// completo los atributos del objeto Productos     
        $resultado = $gp->modificar($p); // lo agrego a la base de datos
        
        foreach ($resultado as $r) { // obtengo el mensaje de la base de datos
            $mensaje = $r->Mensaje;
        }
        Session::flash('mensaje',$mensaje); // mando el mensaje de la base datos a la vista
        return redirect()->back(); // vuelvo al form
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gp = new GestorProveedores();
        $resultado = $gp->baja($id);
        dd($resultado);
    }
}
