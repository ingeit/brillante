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
                    <li style="width: 20%;">
                        <div class="form-group">
                            {{ Form::label('q', 'Agregar Producto a la Venta') }}
                        </div> 
                    </li>
                    <li style="width: 79%;">
                        <div class="form-group">
                            {{ Form::text('q', '', ['id' =>  'q', 'placeholder' =>  'Ej: Lavandina','class'=> 'form-control'])}}
                            {{ Form::hidden('qId', '', ['id' =>  'qId',])}}
                        </div> 
                    </li>
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Ventas</div>
                <div class="panel-body">
                    <table class="table tabla-listaVenta" style="margin-bottom: 0px;">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                    <div  class="table-responsive" style="height: 250px;overflow-y: scroll;overflow-x: hidden;">              
                        <table class="table table-striped tabla-listaVenta">
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
