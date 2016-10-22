@extends('layouts.app')

@section('scripts')
{{ Html::script('js/ingresos.js')}}
{{ Html::style('css/style.css')}}
@endsection

<!-- para trabajar con variables hacemos lo siguiente-->
<!--{{-- */$total=0;/* --}}-->

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <a href="{{URL::previous() }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>            
            <div class="panel-heading">INGRESO NUMERO: {{$ingreso[0]->idIngreso}}</div>
            <div class="panel-heading">FECHA: {{$ingreso[0]->fecha}}</div>
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
            {!! Form::open(['action' => ['PdfController@crearIngreso']]) !!}
            {{ Form::hidden('idIngreso',$ingreso[0]->idIngreso)}} 
                <button style="float:right" class="btn btn-success btn-sm" type="submit">Imprimir</button>
            {!! Form::close() !!}
        </div> 
    </div>
</div>
@endsection
