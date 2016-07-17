<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GestorVentas extends Model
{
<<<<<<< HEAD
    public function nueva(Ventas $v)
    {
        $params = array(
            $v->fecha,
            $v->monto);
        
        
    	$result = DB::select('call venta_nueva(?,?)',$params);
        return $result;
    }
=======
    //probando source tree
>>>>>>> parent of 9b0d86b... Funcion nueva venta (parametros solo de fecha(varchar) monto(double)
}
