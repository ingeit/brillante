<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GestorProveedores;
use App\Proveedores;
use App\Http\Requests;


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
        $titulo= "Crear Proveedor";
        return View('proveedores.form',compact('titulo'));
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
