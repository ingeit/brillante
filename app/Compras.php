<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public $cIdCompra;
    public $cFecha;
    public $cMonto; 
    public $cCadena; 
    
      
    function __construct($fecha, $monto, $cadena)
    {
        $this->cFecha = $fecha;
        $this->cMonto = $monto;
        $this->cCadena = $cadena;
    }
    
    protected $fillable = [
     'fecha', 'monto', 'cadena',
    ];
   
     

}
