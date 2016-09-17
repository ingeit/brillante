<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;


class GestorProveedores extends Model
{
    
    public function alta(Proveedores $p)
    {
        $params = array(
            
            $p->razonSocial,
            $p->direccion,
            $p->telefono);
        
        
    	$result = DB::select('call proveedor_alta(?,?,?)',$params);
        return $result;
    }
    
    public function buscar($cadena)
    {
        $consulta = DB::select('call proveedor_buscar(?)',array($cadena));
        return $consulta;
    }
    

     public function baja($id)
    {
        $parametro = array($id);
        $result = DB::select('call proveedor_baja(?)',$parametro); 
        return $result;
    }
    
    public function modificar(Proveedores $p)
    {
        $params = array(
            
            $p->idProveedor,
            $p->razonSocial,
            $p->direccion,
            $p->telefono,);
        
    	$result = DB::select('call proveedor_modificar(?,?,?,?)',$params);
        dd($result);
        
        return $result;
    }
}
