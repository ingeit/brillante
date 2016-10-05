<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\GestorDolar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        $gestor = new GestorDolar();
            if($role === 'admin'){
                $dolarAtualizado = $gestor->elPrecioEsActual();
                if($dolarAtualizado === 'no'){
                    $precio = $gestor->obtenerPrecioDolar();
                    return view('dolar',compact('precio'));
                }
                else{
                    return view('home');
                } 
            }else if($role === 'vendedor'){
                return redirect()->action('VentasController@index',['seccion'=>'index']);
            }else if($role === 'cajero'){
                return redirect()->action('VentasController@index');
            }
    }  
    
    public function actualizarPrecio(Request $r){
        $gestor = new GestorDolar();
        $mensaje = $gestor->actualizarPrecio($r->dolar);
        return view('home');
    }
}
