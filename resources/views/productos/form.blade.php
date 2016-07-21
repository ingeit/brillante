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
                                {{ Form::text('nombre',null,['autofocus', 'class'=> 'form-control','placeholder'=>'Ingrese el nombre del producto']) }}
                            </div>
                            <div class="form-group">
                               {!! Form::label('precio', 'Precio del Producto'); !!} 
                               {{ Form::text('precio',null,['class'=> 'form-control','placeholder'=>'Ingrese el precio del producto']) }}
                            </div>
                            <div class="form-group">
                                {!! Form::label('proveedores', 'Proveedores'); !!} 
                               {!! Form::select('proveedores', array( 'nombre' => '{{-- */$p->nombre/* --}}' )) !!}
                            </div>
                              <button type="submit" style="float:right" class="btn btn-default">{{Session::get('boton')}}</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection