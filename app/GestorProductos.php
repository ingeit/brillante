<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;


class GestorProductos extends Model
{
    
    public function alta(Productos $p)
    {
        $params = array(
            
            $p->idProveedor,
            $p->nombre,
            $p->precio);
        
        
    	$result = DB::select('call producto_alta(?,?,?)',$params);
        return $result;
    }
    
    public function paginar($cadena)
    {   
        // Pagination Manual para Store Procedure
        $page = Input::get('page', 1);  
        $paginate = 10;  //Cantidad de elementos por pagina 
        $data = DB::select('call producto_buscar(?)',array($cadena));  //Consulta
        $offSet = ($page * $paginate) - $paginate;  
        $itemsForCurrentPage = array_slice($data, $offSet, $paginate, true);  
        $data = new LengthAwarePaginator($itemsForCurrentPage, count($data), $paginate, $page);  //LengthAwarePaginator forma manuel de usar Paginator
        $data->setPath('productos'); //Induca el url 
        return $data;
    }
    
    public function buscar($cadena){
        $data = DB::select('call producto_buscar(?)',array($cadena)); 
        return $data;
    }


    public function modificar(Productos $p)
    {
        $params = array(
            
            $p->idProducto,
            $p->idProveedor,
            $p->nombre,
            $p->precio);
        
        
    	$result = DB::select('call producto_modificar(?,?,?,?)',$params);
        return $result;
    }

}
