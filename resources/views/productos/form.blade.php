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
                    <a href="{{ route('productos.index') }}" type="button" class="btn btn-info">Atras<i class="glyphicon glyphicon-menu-left"></i></a>
                    <div class="panel-heading">{{Session::get('titulo')}}</div>
                    <div class="panel-body">
                        @if(Session::has('edicion'))
                            {{ Form::model($data,['action' => ['ProductosController@update',$data->pIdProducto],'method' => 'put']) }}
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre del Producto'); !!} 
                                {{ Form::text('nombre',null,['disabled', 'class'=> 'form-control','placeholder'=>'Ingrese el nombre del producto']) }}
                            </div>
                        @else
                            {{ Form::open(array('route' => 'productos.store', '_method' => 'post')) }}
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre del Producto'); !!} 
                                {{ Form::text('nombre',null,['autofocus','required', 'class'=> 'form-control','placeholder'=>'Ingrese el nombre del producto']) }}
                            </div>
                        @endif
                            
                            <div class="form-group">
                               {!! Form::label('precio', 'Precio del Producto'); !!} 
                               {{ Form::text('precio',null,['class'=> 'form-control','required','placeholder'=>'Ingrese el precio del producto']) }}
                            </div>
                            <div class="form-group">
                               {!! Form::label('ganancia', 'Ganancia del Producto (%)'); !!} 
                               {{ Form::text('ganancia',null,['class'=> 'form-control','required','placeholder'=>'Ingrese la ganancia del producto sin "%"']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('proveedor', 'Proveedor:') !!}
                                {!! Form::select('idProveedor', $proveedor, null, ['class' => 'form-control','required', 'placeholder' => 'Elija un Proveedor']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('cotizacion', 'Cotizado en:') !!}
                                <div class="radio">
                                    <label>
                                      {{ Form::radio('cotizacion', 'Dolares', 0,['class' => 'field']) }}
                                      US$ Dolares 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                      {{ Form::radio('cotizacion', 'Pesos', 0,['class' => 'field']) }}
                                      $ Pesos
                                    </label>
                                </div>
                            </div>
                            <button type="submit" style="float:right" class="btn btn-default">{{Session::get('boton')}}</button>
                        {{ Form::close() }}
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
            <a href="{{ route('productos.index') }}">Cerrar</a>
        </div>
    </div>
    </div>
</div>
@endsection