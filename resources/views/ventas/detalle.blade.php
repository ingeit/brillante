@extends('layouts.app')

@section('scripts')
{{ Html::style('css/style.css')}}
@endsection

<!-- para trabajar con variables hacemos lo siguiente-->
<!--{{-- */$total=0;/* --}}-->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
            <a href="{{URL::previous() }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
            <div class="panel-heading">VENTA NUMERO: {{$venta[0]->idVenta}}</div>
            <div class="panel-heading">FECHA: {{$venta[0]->fecha}}</div>
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
                          <td>$ {{$v->precio}}</td>
                          <td>$ {{$importe = number_format(($v->cantidad)*($v->precio), 2, '.', '')}}</td><!-- muestra 2 decimales!-->
                        </tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td bgcolor="337ab7"><font color="#fff">Total</td>
                          <td bgcolor="337ab7"><font color="#fff">$ {{$venta[0]->monto}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="panel-heading">DATOS PARA IMPRIMIR FACTURA C</div>
                <div class="panel-body">
                    
                    {!! Form::open(['target'=> '_blank','action' => ['PdfController@crearVenta']]) !!}
                    {{ Form::hidden('idVenta',$venta[0]->idVenta)}} 
                    <div class="form-group row">
                        {!! Form::label('nombre', 'Señor/es:',['class'=>'col-xs-1 col-form-label']); !!} 
                        <div class="col-xs-10">
                            {{ Form::text('nombre',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese el nombre']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('domicilio', 'Domicilio:',['class'=>'col-xs-1 col-form-label']); !!} 
                        <div class="col-xs-10">
                            {{ Form::text('domicilio',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese el domicilio']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('localidad', 'Localidad:',['class'=>'col-xs-1 col-form-label']); !!} 
                        <div class="col-xs-10">
                            {{ Form::text('localidad',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese la localidad']) }}
                        </div> 
                    </div>  
                    <div class="form-group row">
                        {!! Form::label('cuil', 'CUIL/CUIT:',['class'=>'col-xs-1 col-form-label']); !!} 
                        <div class="col-xs-10">
                            {{ Form::text('cuil',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese el CUIL/CUIT del cliente']) }}
                        </div>
                    </div>                
                    <button style="float:right" class="btn btn-success btn-sm" type="submit">Imprimir</button>
                    {!! Form::close() !!}
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
