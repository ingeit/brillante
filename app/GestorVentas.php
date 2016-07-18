<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GestorVentas extends Model
{
    
    public function nueva(Ventas $v)
    {
        $params = array(
            $v->vFecha,
            $v->vMonto);
        
    	$result = DB::select('call venta_nueva(?,?)',$params);
        return $result;
    }
    
    
}
