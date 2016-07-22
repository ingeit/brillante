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
   

}
