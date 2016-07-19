@extends('layouts.app')

@section('scripts')
{{ Html::script('js/autocomplete.js')}}
{{ Html::script('js/agregarVenta.js')}}
{{ Html::script('js/eliminarfilaventa.js')}}
{{ Html::style('css/style.css')}}
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> 
            <div class="panel panel-default">
                <div class="panel-body">
                    <div  class="table-responsive">              
                        <table class="table table-striped tabla-listaVenta">
                            <thead>
                                <tr>
                                    <th>Cant</th>
                                    <th>Cod</th>
                                    <th>Descripcion</th>
                                    <th>Unit</th>
                                    <th>Importe</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <!-- para trabajar con variables hacemos lo siguiente-->
                                {{-- */$total=0;/* --}}
                                @foreach ($venta as $v)
                                <tr>
                                  <td>{{$v->cantidad}}</td>
                                  <td>{{$v->idProducto}}</td>
                                  <td>{{$v->nombre}}</td>
                                  <td>{{$v->precio}}</td>
                                  <td>{{$importe = ($v->cantidad)*($v->precio)}}</td>
                                </tr>
                                {{-- */$total=$total+$importe;/* --}}
                                @endforeach
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td bgcolor="337ab7"><font color="#fff">Total</td>
                                  <td bgcolor="337ab7"><font color="#fff">{{$total}}</td>
                                </tr>
                            </tfoot>
                            <tbody id="tablaVentas">
                            </tbody>
                        </table>
                    </div>
                </div>     
            </div> 
            <a href="{{ route('ventas.index',['seccion'=>'lista']) }}" type="button" class="btn btn-primary" style="float:right;">Volver Lista Ventas</a>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Felicidades!!!</h4>
      </div>
      <div class="modal-body">
        <p>Venta Realizada con Exito.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
@endsection
