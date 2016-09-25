@extends('layouts.app')

@section('scripts')
{{ Html::script('js/ingresos.js')}}
{{ Html::style('css/style.css')}}
@endsection

<!-- para trabajar con variables hacemos lo siguiente-->
<!--{{-- */$total=0;/* --}}-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
            <div class="panel-heading">INGRESO NUMERO: {{$id}}</div>
            <div class="panel-heading">FECHA: {{$fecha}}</div>
            <div class="panel-body">
                <table class="table table-hover" style="margin-bottom: 0;margin-top: -12px;">
                    <thead>
                        <tr>
                            <th>Cant</th>
                            <th>Cod</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                </table>  
                <table id="data" class="table table-hover">
                    <tbody id="resultado">               
                        @foreach ($ingreso as $i)
                        <tr>
                          <td>{{$i->cantidad}}</td>
                          <td>{{$i->idProducto}}</td>
                          <td>{{$i->nombre}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div> 
            <a href="{{ route('ingresos.index',['seccion'=>'lista']) }}" type="button" class="btn btn-primary" style="float:right;">Volver Lista Ingresos</a>
        </div> 
    </div>
</div>
@endsection
