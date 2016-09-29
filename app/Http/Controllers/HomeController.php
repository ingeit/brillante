<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if($role === 'admin'){  
                return view('home');
            }else if($role === 'vendedor'){
                return redirect()->action('VentasController@index',['seccion'=>'index']);
            }else if($role === 'cajero'){
                return redirect()->action('VentasController@index');
            }
    }
    
   
    
    
}
