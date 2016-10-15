<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GestorVentas;
use App\GestorIngresos;
use App\Http\Requests;
use App\GestorDepositos;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
    
    public function crearVenta(Request $r) 
    {
        $gd = new GestorDepositos();
        $deposito = $gd->listar();
        $idVenta = $r->idVenta;
        $gv = new GestorVentas();
        $venta = $gv->dame($idVenta);
        $fecha = $venta[0]->fecha;
        $view =  \View::make('pdfVenta', compact('venta', 'fecha','deposito'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $nombreArchivo="venta numero ".$idVenta.".pdf";
        return $pdf->download($nombreArchivo);
    }
    
        public function crearIngreso(Request $r) 
    {
        $idIngreso = $r->idIngreso;
        $gi = new GestorIngresos();
        $ingreso = $gi->dame($idIngreso);
        $fecha = $ingreso[0]->fecha;
        $view =  \View::make('pdfIngreso', compact('ingreso', 'fecha'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $nombreArchivo="ingreso numero ".$idIngreso.".pdf";
        return $pdf->download($nombreArchivo);
    }
    
}
