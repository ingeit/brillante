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
   
     public function dame($id){
        $result = DB::select('call venta_dame(?)',array($id));
        //el foreach me ayuda a pasar la consulta estructurada de store procedure
        // a objeto, de esa manera se puede trabajar mas facil y autocompleta los campos
        // gracias al form::model , el objeto es un Model de la base de datos por eso 
        // uso fill() para completarlo.
        foreach ($result as $r) {
                $this->fill([
                "fecha" => $r->fecha,
                "monto" => $r->monto,
            ]);
                $this->vIdVenta = $r->idVenta;
        }
    }

}
