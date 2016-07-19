<<<<<<< HEAD
<?php

=======
>>>>>>> 9653fab41413d3a54aa02d0efd6f2ea0cb19115b
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
   
     

<<<<<<< HEAD
}
=======
    }
>>>>>>> 9653fab41413d3a54aa02d0efd6f2ea0cb19115b
