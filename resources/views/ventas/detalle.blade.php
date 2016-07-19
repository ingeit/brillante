@extends('layouts.app')

@section('scripts')
{{ Html::script('js/autocomplete.js')}}
{{ Html::script('js/agregarVenta.js')}}
{{ Html::script('js/eliminarfilaventa.js')}}
{{ Html::style('css/style.css')}}
@endsection

<!-- para trabajar con variables hacemos lo siguiente-->
<!--{{-- */$total=0;/* --}}-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
            <div class="panel-heading">VENTA NUMERO: {{$id}}</div>
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
                        @foreach ($venta as $v)
                        <tr>
                          <td>{{$v->cantidad}}</td>
                          <td>{{$v->idProducto}}</td>
                          <td>{{$v->nombre}}</td>
                          <td>{{$v->precio}}</td>
                          <td>{{$importe = ($v->cantidad)*($v->precio)}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td bgcolor="337ab7"><font color="#fff">Total</td>
                          <td bgcolor="337ab7"><font color="#fff">{{$monto}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div> 
            <a href="{{ route('ventas.index',['seccion'=>'lista']) }}" type="button" class="btn btn-primary" style="float:right;">Volver Lista Ventas</a>
        </div> 
    </div>
</div>
@endsection
