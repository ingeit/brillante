<<<<<<< HEAD
<?php
=======
>>>>>>> 9653fab41413d3a54aa02d0efd6f2ea0cb19115b

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GestorVentas extends Model
{
    
    public function nueva(Ventas $v)
    {
        $params = array(
            $v->vFecha,
            $v->vMonto,
            $v->vCadena );
        
    	$result = DB::select('call venta_nueva(?,?,?)',$params);
        return $result;
    }
    
    public function listar(){
        $data = DB::select('call venta_listar'); 
        return $data;
    }
    
    public function dame($id){
<<<<<<< HEAD
        
        $result = DB::select('call venta_dame(?)',array($id));
        return $result;
        
    }

    
}
=======
        $result = DB::select('call venta_dame(?)',array($id));
        dd($result);
        //return $result;
        
    }
>>>>>>> 9653fab41413d3a54aa02d0efd6f2ea0cb19115b
