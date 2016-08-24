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
            $p->precio,
            $p->cotizacion);
        
        
    	$result = DB::select('call producto_alta(?,?,?,?)',$params); 
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
    
    public function listar(){
        $precio = $this->obtenerPrecioDolar();
        $precio = round($precio, 2);
        $data = DB::select('call producto_listar_stock(?)',array($precio)); 
        return $data;
    }
    
    public function obtenerPrecioDolar(){
        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
        $yql_query = 'select Rate from yahoo.finance.xchange where pair in ("USDARS")';
        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json&env=store://datatables.org/alltableswithkeys&callback=";
        // Make call with cURL
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
        $json = curl_exec($session);
        // Convert JSON to PHP object
        $phpObj =  json_decode($json);
        return $phpObj->query->results->rate->Rate;
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
