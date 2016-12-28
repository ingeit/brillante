<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public $cIdCompra;
    public $cFecha;
    public $cMonto; 
    public $cCadena; 
    
      
    function __construct($monto, $cadena)
    {
        $this->cMonto = $monto;
        $this->cCadena = $cadena;
    }
    
    protected $fillable = [
     'monto', 'cadena',
    ];
   
     

}
