<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    public $cIdCompra;
    public $cIdProveedor;
    public $cFecha;
    public $cMonto;
    public $cCadena;
    
      
    function __construct($idProveedor, $fecha, $monto, $cadena)
    {
        $this->cIdProveedor = $idProveedor;
        $this->cFecha = $fecha;
        $this->cMonto = $monto;
        $this->cCadena = $cadena;
    }
    
    protected $fillable = [
        'idProveedor','fecha', 'monto', 'cadena',
    ];
   
     

}
