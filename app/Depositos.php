<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depoitos extends Model
{
    public $dIdDeposito;
    public $dNombre;
    public $dDireccion; 
    
      
    function __construct()
    {

    }
    
    protected $fillable = [
     '$dNombre', '$dDireccion',
    ];
   
     

}
