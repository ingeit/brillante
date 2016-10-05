@extends('layouts.app')

@section('scripts')
{{ Html::script('js/highlighttable.js')}}
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
                                    <td><a href="{!! route('detalleCompra', ['id'=>$c->idCompra, 'fecha'=>$c->fecha,'monto'=>$c->monto]) !!}">Detalles</a></td>
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
@endsection

