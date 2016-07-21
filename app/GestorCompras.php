<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GestorCompras extends Model
{
    
    public function nueva(Compras $i)
    {
        $params = array(
            $i->vFecha,
            $i->vMonto,
            $i->vCadena );
        
//    	$result = DB::select('call venta_nueva(?,?,?)',$params);
        return $result;
    }
    
    public function listar(){
//        $data = DB::select('call venta_listar'); 
        return $data;
    }
    
    public function dame($id){
//        $result = DB::select('call venta_dame(?)',array($id));
        return $result;
        
    }

    
}
