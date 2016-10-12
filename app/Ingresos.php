<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingresos extends Model
{
    public $iIdIngreso;
    public $iFecha;
    public $iCadena;
    
      
    function __construct($cadena)
    {
        $this->iCadena = $cadena;
    }
    
    protected $fillable = [
        'cadena',
    ];
   
     

}
