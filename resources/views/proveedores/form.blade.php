@extends('layouts.app')

@section('scripts')
    @if(Session::has('resultado'))
    <script>
    $(function() {
        $('#myModal').modal('show');
    });
    </script>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <a href="{{ route('proveedores.index') }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
                    <div class="panel-heading">{{Session::get('titulo')}}</div>
                    <div class="panel-body">
                        @if(Session::has('edicion'))
                            {{ Form::model($data,['action' => ['ProveedoresController@update',$data->idProveedor],'method' => 'put']) }}
                            <div class="form-group">
                                {!! Form::label('razonSocial', 'Razon Social del Proveedor:'); !!} 
                                {{ Form::text('razonSocial',null,['disabled', 'class'=> 'form-control','placeholder'=>'Ingrese razon social del proveedor']) }}
                            </div>
                        @else
                            {{ Form::open(array('route' => 'proveedores.store', '_method' => 'post')) }}
                            <div class="form-group">
                                {!! Form::label('razonSocial', 'Razon Social del Proveedor:'); !!} 
                                {{ Form::text('razonSocial',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese razon social del proveedor']) }}
                            </div>
                        @endif
                            
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

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>  
        </div>
        <div id="tituloModal" class="modal-title" align="center">
            @if (Session::get('codigo') == 0)
                <p class="alert alert-danger" >ERROR</p>  
            @else
                <p class="alert alert-success">CORRECTO</p>
            @endif
        </div>
        <div id="mensajeModal" class="modal-body" align="center">
            <p>{{Session::get('mensaje')}}</p>
        </div>
        <div class="modal-footer">
            <a href="{{ route('proveedores.index') }}">Cerrar</a>
        </div>
    </div>
    </div>
</div>
@endsection