<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GestorVentas extends Model
{
    public function nueva(Ventas $v)
    {
        $params = array(
            $v->fecha,
            $v->monto);
        
        
    	$result = DB::select('call venta_nueva(?,?)',$params);
        return $result;
    }
}
