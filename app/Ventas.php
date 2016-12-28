<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public $vIdVenta;
    public $vFecha;
    public $vMonto;
    public $vCadena;

    
    function __construct($monto, $cadena)
    {
        $this->vMonto = $monto;
        $this->vCadena = $cadena;
    }
    
    protected $fillable = [
       'monto', 'cadena',
    ];
   
     

}
