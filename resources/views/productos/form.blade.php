@extends('layouts.app')

@section('scripts')
    @if(Session::has('resultado'))
    <script>
    $(function() {
        $('#modal1').openModal();
    });
    </script>
    @endif
@endsection

@section('content')
    <div class="row">
        <div class="col s12">
            <a href="{{URL::previous() }}" type="button" class="btn btn-info">Atras<i class="fa fa-exit"></i></a>
        </div>
        
        <div class="col s12" style="margin-top: 1%">
           
            <h3 class="header">{{Session::get('titulo')}}</h3>

            @if(Session::has('edicion'))
                {{ Form::model($data,['action' => ['ProductosController@update',$data->pIdProducto],'method' => 'put']) }}
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('nombre', 'Nombre del Producto'); !!} 
                        {{ Form::text('nombre',null,['disabled', 'class'=> '','placeholder'=>'Ingrese el nombre del producto']) }}
                    </div>
                </div>
            @else
                {{ Form::open(array('route' => 'productos.store', '_method' => 'post')) }}
                <div class="row">
                    <div class="input-field">
                {!! Form::label('nombre', 'Nombre del Producto'); !!} 
                {{ Form::text('nombre',null,['autofocus','required', 'class'=> '','placeholder'=>'Ingrese el nombre del producto']) }}
                    </div>
                </div>
            @endif
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('precio', 'Precio del Producto'); !!} 
                        {{ Form::text('precio',null,['class'=> '','required','placeholder'=>'Ingrese el precio del producto']) }}
                    </div>
                </div>        
                <div class="row">
                    <div class="input-field">
                        {!! Form::label('ganancia', 'Ganancia del Producto (%)'); !!} 
                        {{ Form::text('ganancia',null,['class'=> '','required','placeholder'=>'Ingrese la ganancia del producto sin "%"']) }}
                    </div>
                </div>        
                <div class="row">
                    <div class="input-field">
                        {!! Form::select('idProveedor', $proveedor, null, ['class' => '','required', 'placeholder' => 'Elija un Proveedor']) !!}
                        {!! Form::label('idProveedor', 'Proveedor'); !!} 
                    </div>
                </div>    
                <div class="row">
                    <div class="input-field">                        
                        {!! Form::select('idDeposito', $deposito, null, ['class' => '','required', 'placeholder' => 'Elija un Deposito']) !!}
                        {!! Form::label('idDeposito', 'Deposito'); !!} 
                    </div>
                </div>
                <div class="row">
                        {!! Form::label('cotizacion', 'Cotizado en:') !!} 
                        <p>
                        {{ Form::radio('cotizacion', 'Dolares', 0,['id' => 'cotizacion1']) }}
                        {!! Form::label('cotizacion1', 'US$ Dolares') !!}
                        </p>
                        <p>
                        {{ Form::radio('cotizacion', 'Pesos', 0,['id' => 'cotizacion2']) }}
                        {!! Form::label('cotizacion2', '$ Pesos') !!}
                        </p>
                </div>
                <div class="row">
                    <div class="input-field">   
                        <button type="submit" style="float:right" class="btn btn-default">{{Session::get('boton')}}</button>
                    </div>
                </div>
                
                {{ Form::close() }}   
        </div>
    </div>



<div id="modal1" class="modal">
  <div class="modal-content">
    @if (Session::get('codigo') == 0)
        <h4 id="tituloModal">ERROR</h4>
    @else
        <h4 id="tituloModal">CORRECTO</h4>
    @endif
    <p id="mensajeModal">{{Session::get('mensaje')}}</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
  </div>
</div>
@endsection