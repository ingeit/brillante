@extends('layouts.app')

@section('scripts')
{{ Html::script('js/liveSearch.js')}}
{{ Html::script('js/highlighttable.js')}}
{{ Html::style('css/style.css')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                <div class="panel panel-default">
                <div class="panel-heading">Ventas Realizadas</div>
                <div class="panel-body">
                    <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                        <thead>
                            <tr>
                                <th>Nº Venta</th>
                                <th>Fecha</th>
                                <th>Total $</th>
                                <th></th>  
                            </tr>
                        </thead>
                    </table>    
                    <div  class="table-responsive" style="height: 250px;overflow-y: scroll;overflow-x: hidden;">              
                        <table id="data" class="table table-hover">
                            <tbody id="resultado">
                                @foreach ($listaVenta as $l)
                                <tr>
                                    <td>{{$l->idVenta}}</td>
                                    <td>{{$l->fecha}}</td>
                                    <td>{{$l->monto}}</td>
                                    <td><a style='float:left;' href="{{route('ventas.show',$l->idVenta)}}">Detalles</a></td>
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
<<<<<<< HEAD
@endsection

=======
>>>>>>> 9653fab41413d3a54aa02d0efd6f2ea0cb19115b
