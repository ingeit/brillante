@extends('layouts.app')

@section('scripts')
{{ Html::script('js/compras.js')}}
<script>
    iniciar();
</script>
{{ Html::style('css/style.css')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <div class="panel panel-default"><a href="{{ route('compras.index',['seccion'=>'index']) }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
                    
                <div class="panel-heading">Compras Realizadas</div>
                <div class="panel-body">
                    <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                        <thead>
                            <tr>
                                <th>Nº Compra</th>
                                <th>Fecha</th>
                                <th>Total $</th>
                                <th></th>  
                            </tr>
                        </thead>
                    </table>    
                    <div  class="table-responsive" style="height: 250px;overflow-y: scroll;overflow-x: hidden;">              
                        <table id="data" class="table table-hover">
                            <tbody id="resultado">
                                @foreach ($listaCompra as $c)
                                <tr>
                                    <td>{{$c->idCompra}}</td>
                                    <td>{{$c->fecha}}</td>
                                    <td>$ {{$c->monto}}</td> 
                                    <td>
                                        {!! Form::open(['action' => ['ComprasController@mostrar']]) !!}
                                        {{ Form::hidden('idCompra',$c->idCompra)}} 
                                            <button style="float:right" class="btn btn-default btn-sm" type="submit">Detalles</button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <button style="float:right" class="btn btn-danger btn-sm" onclick="compraEliminar(this)" data-idcompra="{{$c->idCompra}}">Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>     
                </div>
            </div>
        </div>
    </div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div id="tituloModal" class="modal-title" align="center">
        </div>
        <div id="mensajeModal" class="modal-body" align="center">
        </div>
        <div id="botonModal" class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
@endsection

