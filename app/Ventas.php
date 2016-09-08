<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    public $vIdVenta;
    public $vFecha;
    public $vMonto;
    public $vCadena;

    
    function __construct($fecha, $monto, $cadena)
    {
        $this->vFecha = $fecha;
        $this->vMonto = $monto;
        $this->vCadena = $cadena;
    }
    
    protected $fillable = [
        'fecha', 'monto', 'cadena',
    ];
   
     

}
