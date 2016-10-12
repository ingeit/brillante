<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GestorIngresos extends Model
{
    public function nuevo(Ingresos $i)
    {
        $params = array(
            $i->iCadena );
    	$result = DB::select('call ingreso_nuevo(?)',$params);
        return $result;
    }
    
    public function listar(){
        $data = DB::select('call ingreso_listar'); 
        return $data;
    }
    
    public function dame($id){
        $result = DB::select('call ingreso_dame(?)',array($id));
        return $result;
        
    }
    
    public function baja($id)
    {
        $parametro = array($id);
        $result = DB::select('call ingreso_eliminar(?)',$parametro); 
        return $result;
    }

    
}
