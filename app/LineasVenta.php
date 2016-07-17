<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineasVenta extends Model
{
    public $lineaIdProducto;
    public $lineaIdVenta;
    public $lineaCantidad;
    
    public $timestamps = false; 
      
    function __construct()
    {
        $this->lineaCantidad = $cantidad;
    }
    
    
    protected $fillable = [
        'cantidad',
    ];
   
     
}
