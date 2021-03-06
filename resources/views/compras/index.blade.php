@extends('layouts.app')

@section('scripts')
{{ Html::script('js/compras.js')}}
<script>iniciar();</script>
{{ Html::style('css/style.css')}}
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col m10 offset-s1"> 
            <div>
                <dl class="list">
                    <dt style="width: 100%;"> 
                        <div class="form-group">
                            {{ Form::label('q', 'Agregar Producto a la Compra') }}
                            {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control','autofocus'])}}
                            {{ Form::hidden('qId', '', ['id' =>  'qId',])}}
                            <div id="stockContainer">
                            </div>
                        </div> 
                    </dt>
                    <dt style="width: 100%;">
                        <div class="form-group2">
                            {{ Form::label('SelectCant', 'Cantidad') }}
                            {{ Form::text('SelectCant', '', ['id' =>  'SelectCant', 'placeholder' =>  '1','class'=> 'form-control'])}}
                        </div> 
                    </dt>
                <dl>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Compras</div>
                <div class="panel-body">
                    <div  class="table-responsive">              
                        <table class="table table-striped tabla-listaCompra">
                            <thead>
                                <tr>
                                    <th>Cant</th>
                                    <th>Cod</th>
                                    <th>Descripcion</th>
                                    <th>Unit s/iva</th>
                                    <th>Importe</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td align="right" >TOTAL: $</td>
                                  <td id="total">0</td>
                                  <td></td>
                                </tr>
                            </tfoot>
                            <tbody id="tablaCompras">
                            </tbody>
                        </table>
                    </div>
                </div>     
            </div> 
            <button type="button" class="btn btn-primary" id="realizarCompra" style="float:right;" onclick="cargarCompra()" disabled="disabled">Realizar Compra</button>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div id="tituloModal" class="modal-title" align="center">
            @if (Session::get('codigo') == 0)
                <p class="alert alert-danger" >ERROR</p>  
            @else
                <p class="alert alert-success">CORRECTO</p>
            @endif
        </div>
        <div id="mensajeModal" class="modal-body" align="center">
            <p>{{Session::get('mensaje')}}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
@endsection
