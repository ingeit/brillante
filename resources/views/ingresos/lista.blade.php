@extends('layouts.app')

@section('scripts')
{{ Html::script('js/highlighttable.js')}}
{{ Html::style('css/style.css')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <div class="panel panel-default">
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
                                    <td><a href="{!! route('detalleIngreso', ['id'=>$l->idIngreso, 'fecha'=>$l->fecha]) !!}">Detalles</a></td>
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

