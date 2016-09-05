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
                            {!! Form::model($data,['route' => ['productos.update',$data->pIdProducto],'method'=>'PUT']) !!}
                        @else
                            {!! Form::open(array('route' => 'productos.store')) !!}
                        @endif
                            <div class="form-group">
                                {!! Form::label('nombre', 'Nombre del Producto'); !!} 
                                {{ Form::text('nombre',null,['autofocus','required', 'class'=> 'form-control','placeholder'=>'Ingrese el nombre del producto']) }}
                            </div>
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
                            @if(Session::has('edicion'))
                                {!! Form::open(['route' => ['productos.destroy',$data->pIdProducto],'method'=>'delete']) !!}
                                        <button style="float:right" class="btn btn-danger" type="submit">Eliminar</button>
                                {!! Form::close() !!}
                            @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection