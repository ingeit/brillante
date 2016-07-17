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
            <div>
                <ul class="list-inline">
                    <li style="width: 90%;">
                        <div class="form-group">
                            {{ Form::label('q', 'Agregar Producto a la Venta') }}
                            {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control','autofocus'])}}
                            {{ Form::hidden('qId', '', ['id' =>  'qId',])}}
                        </div> 
                    </li>
                    <li style="width: 10%;float: right;">
                        <div class="form-group">
                            {{ Form::label('SelectCant', 'Cantidad') }}
                            {{ Form::text('SelectCant', '', ['id' =>  'SelectCant', 'placeholder' =>  '1','class'=> 'form-control'])}}
                        </div> 
                    </li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Ventas</div>
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>TOTAL</td>
                                  <td id="total">0</td>
                                  <td></td>
                                </tr>
                            </tfoot>
                            <tbody id="tablaVentas">
                            </tbody>
                        </table>
                    </div>
                </div>     
            </div> 
            <button type="button" class="btn btn-primary" id="realizarVenta" style="float:right;" onclick="cargarVenta()" disabled="disabled">Realizar Venta</button>
        </div>
    </div>
</div>
@endsection
