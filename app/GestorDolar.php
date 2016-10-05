<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class GestorDolar extends Model
{
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
    
    public function elPrecioEsActual(){
       $dolarAtualizado =  DB::select('call dolar_isUpdate()');
       return $dolarAtualizado[0]->esActual;
    }
    
    public function actualizarPrecio($precio){
        $params = array($precio);
        $dolarAtualizado =  DB::select('call dolar_insertar(?)',$params);
        return $dolarAtualizado[0]->mensaje;
    }
}
