<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class GestorDolar extends Model
{
    public function obtenerPrecioDolar(){
//        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
//        $yql_query = 'select Rate from yahoo.finance.xchange where pair in ("USDARS")';
//        $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json&env=store://datatables.org/alltableswithkeys&callback=";
//        // Make call with cURL
//        $session = curl_init($yql_query_url);
//        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
//        $json = curl_exec($session);
//        // Convert JSON to PHP object
//        $phpObj =  json_decode($json);
//        try{
//            $dolar = "$ ".$phpObj->query->results->rate->Rate;
//        } catch (\Exception $ex) {
//            $dolar = "Imposible obtener informacion dolar";
//        }
//        
//        return $dolar;

        $url = "http://www.cotizacion-dolar.com.ar/";
        $rawdata = file_get_contents($url);
        $data = explode('<span class="cotizacion-num">', $rawdata);
        $dolar = $data[2];
        $dolar=substr($dolar, 0, 5);
        $dolar = "$ ".$dolar;
        return $dolar;
        
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
