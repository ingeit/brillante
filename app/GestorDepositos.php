<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GestorDepositos extends Model
{ 
     
    public function listar(){
        $data = DB::select('call deposito_listar()'); 
        return $data;
    }
    
}
