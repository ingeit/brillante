@extends('layouts.app')

@section('scripts')
{{ Html::script('js/ingresos.js')}}
<script>
    iniciar();
</script>
{{ Html::style('css/style.css')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <div class="panel panel-default">
                <a href="{{ route('ingresos.index',['seccion'=>'index']) }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
                <div class="panel-heading">Ingresos Realizados</div>
                <div class="panel-body">
                    <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                        <thead>
                            <tr>
                                <th>Nº Ingreso</th>
                                <th>Fecha</th>
                                <th></th>  
                            </tr>
                        </thead>
                    </table>    
                    <div  class="table-responsive" style="height: 250px;overflow-y: scroll;overflow-x: hidden;">              
                        <table id="data" class="table table-hover">
                            <tbody id="resultado">
                                @foreach ($listaIngreso as $l)
                                <tr>
                                    <td>{{$l->idIngreso}}</td>
                                    <td>{{$l->fecha}}</td>
                                    <td>
                                        {!! Form::open(['action' => ['IngresosController@mostrar']]) !!}
                                        {{ Form::hidden('idIngreso',$l->idIngreso)}} 
                                            <button style="float:right" class="btn btn-default btn-sm" type="submit">Detalles</button>
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        <button style="float:right" class="btn btn-danger btn-sm" onclick="ingresoEliminar(this)" data-idingreso="{{$l->idIngreso}}">Eliminar</button>
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

