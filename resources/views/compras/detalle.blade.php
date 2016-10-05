@extends('layouts.app')

@section('scripts')
{{ Html::script('js/compras.js')}}
{{ Html::style('css/style.css')}}
@endsection

<!-- para trabajar con variables hacemos lo siguiente-->
<!--{{-- */$total=0;/* --}}-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <a href="{{ route('compras.index',['seccion'=>'lista']) }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
            <div class="panel-heading">COMPRA NUMERO: {{$id}}</div>
            <div class="panel-heading">FECHA: {{$fecha}}</div>
            <div class="panel-body">
                <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                    <thead>
                        <tr>
                            <th>Cant</th>
                            <th>Cod</th>
                            <th>Descripcion</th>
                            <th>Unit</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                </table>  
                <table id="data" class="table table-hover">
                    <tbody id="resultado">               
                        @foreach ($compra as $c)
                        <tr>
                          <td>{{$c->cantidad}}</td>
                          <td>{{$c->idProducto}}</td>
                          <td>{{$c->nombre}}</td>
                          <td>$ {{$c->precio}}</td>
                          <td>$ {{$importe =  number_format(($c->cantidad)*($c->precio), 2, '.', '')}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td bgcolor="337ab7"><font color="#fff">Total</td>
                          <td bgcolor="337ab7"><font color="#fff">$ {{$monto}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div> 
            <a href="{{ route('compras.index',['seccion'=>'lista']) }}" type="button" class="btn btn-primary" style="float:right;">Volver Lista Compras</a>
        </div> 
    </div>
</div>
@endsection
