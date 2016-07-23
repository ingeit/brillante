<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proveedores extends Model
{
    public $pIdProveedor;
    public $pRazonSocial;
    public $pDireccion;
    public $pTelefono;
    
    public $timestamps = false; 
      
    function __construct()
    {
        $args = func_get_args();
        $nargs = func_num_args();
        switch($nargs){ 
        case 1:
        self::__construct1();
        break;
        case 2:
        self::__construct2($args[0], $args[1]);
        break;
        }
    }

    function __construct1()
    {
        
    }
    
    function __construct2($razonSocial, $direccion, $telefono)
    {
        $this->pRazonSocial = $razonSocial;
        $this->pDireccion = $direccion;
        $this->pTelefono = $telefono;
    }
    
    
    protected $fillable = [
        'razonSocial', 'direccion', 'telefono',
    ];
    
    public function dame($id){
        $result = DB::select('call proveedor_dame(?)',array($id));
        //el foreach me ayuda a pasar la consulta estructurada de store procedure
        // a objeto, de esa manera se puede trabajar mas facil y autocompleta los campos
        // gracias al form::model , el objeto es un Model de la base de datos por eso 
        // uso fill() para completarlo.
        foreach ($result as $r) {
                $this->fill([
                "razonSocial" => $r->razonSocial,
                "direccion" => $r->direccion,
                "telefono" => $r->telefono,
            ]);
        
        }
    }
   

}
