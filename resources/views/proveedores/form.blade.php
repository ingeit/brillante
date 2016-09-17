@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if(Session::has('mensaje'))
                    <div class="alert alert-success">
                        <strong>Correcto!</strong> {{Session::get('mensaje')}}
                    </div>           
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">{{Session::get('titulo')}}</div>
                    <div class="panel-body">
                        @if(Session::has('edicion'))
                            {{ Form::model($data,['action' => ['ProveedoresController@update',$data->idProveedor],'method' => 'put']) }}
                        @else
                            {{ Form::open(array('route' => 'proveedores.store', '_method' => 'post')) }}
                        @endif
                            <div class="form-group">
                                {!! Form::label('razonSocial', 'Razon Social del Proveedor:'); !!} 
                                {{ Form::text('razonSocial',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese razon social del proveedor']) }}
                            </div>
                            <div class="form-group">
                               {!! Form::label('direccion', 'Direccion del Proveedor:'); !!} 
                               {{ Form::text('direccion',null,['class'=> 'form-control','placeholder'=>'Ingrese el precio del producto']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('telefono', 'Telefono del Proveedor:') !!}
                                {{ Form::text('telefono',null,['class'=> 'form-control','placeholder'=>'Ingrese el telefono del proveedor']) }}
                            </div>
                              <button type="submit" style="float:right" class="btn btn-default">{{Session::get('boton')}}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection